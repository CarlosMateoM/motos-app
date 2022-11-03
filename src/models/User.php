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

    public function getId(): int
    {
        return $this->id;
    }

    
    public function setEstado(bool $estado)
    {
        $this->estado = $estado;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getPassword(): string
    {
        return $this->password;
    }




    public function save()
    {
        try {

            $sql = "INSERT INTO `ESTUDIANTE`(`USUARIO`, `PASSWORD_2`, `TELEFONO`, `ID_POWERCAMPUS`, `FECHA_CREACION_USUARIO`, `NOMBRE`, `EMAIL`, `ESTADO`, `IDENTIFICACION`, `SERVICIO`, `CUENTA_ACTIVA`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $this->prepare($sql);

            $pass = $this->get_has_password();
            $boolena = false;

            $query->bindParam(1, $this->username, PDO::PARAM_STR);
            $query->bindParam(2, $pass, PDO::PARAM_STR);
            $query->bindParam(3, $this->phone, PDO::PARAM_STR);
            $query->bindParam(4, $this->id_power, PDO::PARAM_INT);
            $query->bindParam(5, $this->today, PDO::PARAM_STR);
            $query->bindParam(6, $this->name, PDO::PARAM_STR);
            $query->bindParam(7, $this->email, PDO::PARAM_STR);
            $query->bindParam(8, $this->estado, PDO::PARAM_INT);
            $query->bindParam(9, $this->identificacion, PDO::PARAM_STR);
            $query->bindParam(10, $boolena, PDO::PARAM_BOOL);
            $query->bindParam(11, $boolena, PDO::PARAM_BOOL);


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

    public static function getUser(string $username): User
    {
        try {
            $db = new Database();
            $sql = "SELECT * FROM ESTUDIANTE WHERE USUARIO LIKE ? ";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $rows = $query->rowCount();

            //if ($rows == 0) {
            //  return null;
            //}else {
            if ($rows > 0) {
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
            return new User(-1, "null", "null", "null", "null", "null", "null");
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public static function setUserEstado(bool $estado, int $id_est)
    {
        try {
            $db = new Database();
            $sql = "UPDATE `ESTUDIANTE` SET `ESTADO`= ? WHERE `idESTUDIANTE` = ?";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $estado, PDO::PARAM_BOOL);
            $query->bindParam(2, $id_est, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo $id_est;
            error_log($e->getMessage());
            throw $e;
        }
    }

    public static function setServicio(bool $servicio, int $id_est)
    {
        try {
            $db = new Database();
            $sql = "UPDATE `ESTUDIANTE` SET `SERVICIO`= ? WHERE `idESTUDIANTE` = ?";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $servicio, PDO::PARAM_BOOL);
            $query->bindParam(2, $id_est, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo $id_est;
            error_log($e->getMessage());
            throw $e;
        }
    }

    public static function sendRequestService(int $idSender, int $idReceiver):bool
    {
        try {
            $db = new Database();
            $sql = "INSERT INTO `RUTA`( `ESTUDIANTE_idESTUDIANTE`, `COMPANERO_RUTA`, `SOLICITUD`) VALUES (?, ?, ?)";
            $query = $db->connect()->prepare($sql);
            $solicitud = true;
            $query->bindParam(1, $idSender, PDO::PARAM_INT);
            $query->bindParam(2, $idReceiver, PDO::PARAM_INT);
            $query->bindParam(3, $solicitud, PDO::PARAM_BOOL);
            $query->execute();
            if($query){
                return true;
            }
            return false;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }


    public static function getUsersConnectedToWork():string
    {
        try {
            $db = new Database();
            $sql = "SELECT * FROM `ESTUDIANTE` WHERE `SERVICIO` LIKE TRUE AND `ESTADO` LIKE TRUE;";
            $query = $db->connect()->prepare($sql);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_NUM);

            $json = array();
            foreach($data as $row){
                $json[] = array(
                    'idEstudiante' => $row[0],
                    'usuario' => $row[1],
                    'password' => $row[2],
                    'telefono' => $row[3],
                    'idPowerCampus' => $row[4],
                    'fechaCreacion' => $row[5],
                    'nombre' => $row[6],
                    'email' => $row[7],
                    'estado' => $row[8],
                    'identificacion' => $row[9],
                    'servicio' => $row[10],
                    'cuentaActiva' => $row[11],
                );
            }

            $jsonString = json_encode($json);
            return $jsonString;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }


    public static function receiveServiceRequest(int $id):int
    {
        try {
            $db = new Database();
            $sql = "SELECT * FROM `RUTA` WHERE `COMPANERO_RUTA` LIKE ? AND `SOLICITUD`LIKE TRUE";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $id, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){
                $data = $query->fetchAll(PDO::FETCH_NUM);
                $row = $data[0];
                return $row[1];
            }else {
                return -1;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }
}
