<?php
include("./db_connection.php");

$con = connection();

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? AND PASSWORD_2 LIKE ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();


$result = $stmt->get_result();

if(mysqli_num_rows($result) == 0){
    header("location: ./../login.php?login=incorrect_credentials");
}

while ($row = $result->fetch_array(MYSQLI_NUM)) {
    echo $row[1], $row[2];
}

?>




