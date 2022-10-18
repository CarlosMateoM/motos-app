<?php
if (isset($_POST['login-btn'])) {

    require("./db_connection.php");

    $con = connection();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("location: ./../login.php?login=empty");
        exit();
    }

    $sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? ";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();


    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 0) {
        header("location: ./../login.php?login=incorrect_credentials&username=$username");
        exit();
    }


    if ($row = $result->fetch_array(MYSQLI_NUM)) {
        if (password_verify($password, $row[2])) {
            session_start();
            $_SESSION['idEstudiante'] = $row[1];
            //header("locat")
        } else {
            header("location: ./../login.php?login=incorrect_credentials&username=$username");
            exit();
        }
    }

} else {
    header("location: ./../login.php");
    exit();
}

