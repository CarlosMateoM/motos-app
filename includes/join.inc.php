<?php 

if(!isset($_POST['register-btn'])){
    header("location: ./../join.php");
    exit();
}

$id_power = $_POST['id_power'];
$id_identificacion = $_POST['id_identificacion'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];



if(empty($id_power) || empty($id_identificacion) 
|| empty($username) || empty($name) || empty($email
|| empty($password) || empty($re_password))){
    header("location: ./../join.php?error=emptyfields");
    exit();
} 
else if (!is_numeric($id_power)) {
    header("location: ./../join.php?error=id_power_wrong&id=$id_identificacion&username=$username&email=$email&name=$name");
    exit();
} 
else if(!is_numeric($id_identificacion)){
    header("location: ./../join.php?error=id_wrong&idpower=$id_power&username=$username&email=$email&name=$name");
    exit();
}
else if(!preg_match("/^[a-zA-Z]*[0-9]*$/", $username )){
    header("location: ./../join.php?error=username_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name");
    exit();
}
else if(!preg_match("/^[a-zA-Z ]*$/", $name)){
    header("location: ./../join.php?error=name_wrong&id=$id_identificacion&idpower=$id_power&email=$email&username=$username");
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location: ./../join.php?error=email_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name");
    exit();
}
else if($password !== $re_password){
    header("location: ./../join.php?error=password_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username");
    exit();
}


