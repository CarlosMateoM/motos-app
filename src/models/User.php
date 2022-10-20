<?php

namespace Mateo\MotosApp\models;

use PDO;
use PDOException;
use Mateo\MotosApp\lib\Model;
use Mateo\MotosApp\lib\Database;


class User extends Model
{

    private int $id;
    private int $id_power;
    private string $identificacion;
    private string $username;
    private string $name;
    private string $phone;
    private string $email;
    private string $password;
    private string $today;
    private bool $estado;


    public function __construct(
        int $id_power,
        string $identificacion,
        string $username,
        string $name,
        string $phone,
        string $email,
        string $password
    ) {
        parent::__construct();
        $this->id = -1;
        $this->id_power = $id_power;
        $this->identificacion = $identificacion;
        $this->username = $username;
        $this->phone = $phone;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->estado = false;
        $this->today = date("Y/m/d");
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setEstado(bool $estado)
    {
        $this->estado = $estado;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getPassword():string
    {
        return $this->password;
    }

    


    public function save()
    {
        try {

            $sql = "INSERT INTO `ESTUDIANTE`(`USUARIO`, `PASSWORD_2`, `TELEFONO`, `ID_POWERCAMPUS`, `FECHA_CREACION_USUARIO`, `NOMBRE`, `EMAIL`, `ESTADO`, `IDENTIFICACION`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $this->prepare($sql);

            $pass = $this->get_has_password();

            $query->bindParam(1, $this->username, PDO::PARAM_STR);
            $query->bindParam(2, $pass, PDO::PARAM_STR);
            $query->bindParam(3, $this->phone, PDO::PARAM_STR);
            $query->bindParam(4, $this->id_power, PDO::PARAM_INT);
            $query->bindParam(5, $this->today, PDO::PARAM_STR);
            $query->bindParam(6, $this->name, PDO::PARAM_STR);
            $query->bindParam(7, $this->email, PDO::PARAM_STR);
            $query->bindParam(8, $this->estado, PDO::PARAM_INT);
            $query->bindParam(9, $this->identificacion, PDO::PARAM_STR);

            $query->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
            return false;
        }
    }


    public function get_has_password(): string
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    public static function validate_username(string $username): bool
    {
        try {
            $db = new Database();
            $sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? ";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
            return false;
        }
    }

    public static function get_user(string $username): User
    {
        try {
            $db = new Database();
            $sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? ";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $rows = $query->rowCount();
            
            if ($rows == 0) {
                return null;
            }else {
   
                $data = $query->fetchAll(PDO::FETCH_NUM);
                
                $row = $data[0];

                $user = new User(
                    $row[4],
                    $row[9],
                    $row[1],
                    $row[6],
                    $row[3],
                    $row[7],
                    $row[2]
                );
                
                $user->setDate($row[5]);
                $user->setId($row[0]);
                
                return $user;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
            return false;
        }
    }
}
