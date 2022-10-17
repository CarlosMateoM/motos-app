<?php
include("./db_connection.php");

$con = connection();

$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password)){
    header("location: ./../login.php?login=empty");
    exit();
}

$sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? ";

$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();


$result = $stmt->get_result();

if(mysqli_num_rows($result) == 0){
    header("location: ./../login.php?login=incorrect_credentials&username=$username");
}


if($row = $result->fetch_array(MYSQLI_NUM)){
    if(password_verify($password, $row[2])){
        echo 'sesión iniciada';
    } else {
        header("location: ./../login.php?login=incorrect_credentials&username=$username");
    }
}

/*while ($row = $result->fetch_array(MYSQLI_NUM)) {
    echo $row[1], $row[2];
    echo password_hash("123456", PASSWORD_BCRYPT);
}*/

?>




