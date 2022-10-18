<?php 

require("db_connection.php");

if(!isset($_POST['register-btn'])){
    header("location: ./../join.php");
    exit();
}

$id_power = $_POST['id_power'];
$id_identificacion = $_POST['id_identificacion'];
$username = $_POST['username'];
$name = $_POST['name'];
$phone = $_POST['telefono'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];
$today = date("Y/m/d");


if(empty($id_power) || empty($id_identificacion) 
|| empty($username) || empty($name) || empty($email
|| empty($password) || empty($re_password))){
    header("location: ./../join.php?error=emptyfields");
    exit();
} 
else if (!is_numeric($id_power)) {
    header("location: ./../join.php?error=id_power_wrong&id=$id_identificacion&username=$username&email=$email&name=$name&telefono=$phone");
    exit();
} 
else if(!is_numeric($id_identificacion)){
    header("location: ./../join.php?error=id_wrong&idpower=$id_power&username=$username&email=$email&name=$name&telefono=$phone");
    exit();
}
else if(!preg_match("/^[a-zA-Z]*[0-9]*$/", $username )){
    header("location: ./../join.php?error=username_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&telefono=$phone");
    exit();
}
else if(!preg_match("/^[a-zA-Z ]*$/", $name)){
    header("location: ./../join.php?error=name_wrong&id=$id_identificacion&idpower=$id_power&email=$email&username=$username&telefono=$phone");
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location: ./../join.php?error=email_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&telefono=$phone");
    exit();
}
else if($password !== $re_password){
    header("location: ./../join.php?error=password_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username&telefono=$phone");
    exit();
}
else if(!preg_match("/3[0-9]{9}/", $phone)){
    header("location: ./../join.php?error=phone_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username");
    exit();
}
else{
    
    $con = connection();
    
    $stmt = mysqli_stmt_init($con);

    $sql = "SELECT `USUARIO` FROM `ESTUDIANTE` WHERE `USUARIO` LIKE ?";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ./../join.php?error=password_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            header("location: ./../join.php?error=usernamenotavailable&id=$id_identificacion&idpower=$id_power&email=$email&name=$name");
            exit();
        }
    } 


    $sql = "INSERT INTO `ESTUDIANTE`(`USUARIO`, `PASSWORD_2`, `TELEFONO`, `ID_POWERCAMPUS`, `FECHA_CREACION_USUARIO`, `NOMBRE`, `EMAIL`) VALUES (?,?,?,?,?,?,?)";
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ./../join.php?error=password_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username");
        exit();
    }
    else {

        mysqli_stmt_bind_param($stmt,"sssisss", $username, password_hash($password, PASSWORD_DEFAULT), $phone, $id_power, $today, $name, $email);
        mysqli_stmt_execute($stmt);
        header("location: ./../join.php");
        exit();

    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}


