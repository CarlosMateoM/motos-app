<?php 

namespace Mateo\MotosApp\lib;

use Exception;
use PDO;
use PDOException;

class Database {

    private string $servername = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $db = 'motos-app';


    public function __construct()
    {

        $this->servername = $_ENV['SERVERNAME'];
        $this->username = $_ENV['USERNAME'];
        $this->password = $_ENV['PASSWORD'];
        $this->db = $_ENV['DB'];

    }

    public function connect():PDO{

        try{

            $pdo = new PDO(
                "mysql:host=$this->servername;dbname=$this->db",
             $this->username, $this->password);
            
            return $pdo;

        }catch(PDOException $e){
            error_log($e);
            throw $e;
        }
        return null;
        /*
        $con = new mysqli($this->servername, $this->username, $this->password);
        mysqli_select_db($con, $this->db);
    
        if($con->connect_error){
            die("Connection failed: ". $con->connect_error);
            return false;
        }
    
        return $con;*/
    }
}

