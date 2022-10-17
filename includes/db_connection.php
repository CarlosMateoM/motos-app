<?php 

function connection(){
   
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'motos-app';
    
    $con = new mysqli($servername, $username, $password);
    mysqli_select_db($con, $db);

    if($con->connect_error){
        die("Connection failed: ". $con->connect_error);
        return false;
    }

    return $con;
}


?>