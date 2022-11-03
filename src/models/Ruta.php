<?php

namespace Mateo\MotosApp\models;

use PDO;
use PDOException;
use Mateo\MotosApp\lib\Model;
use Mateo\MotosApp\lib\Database;


class Ruta extends Model
{
    private int $idRuta;
    private int $idEstudiante;
    private int $idCompanero;
    private bool $solicitud;

    public function __construct(
        int $idRuta, 
        int $idEstudiante,
        int $idCompanero,
        int $solicitud
    )
    {
        parent::__construct();
        $this->idRuta = $idRuta;
        $this->idEstudiante = $idEstudiante;
        $this->idCompanero = $idCompanero;
        $this->solicitud = $solicitud;
    }

    public static function setEstadoRuta(int $idRuta, bool $estado)
    {
        try {
            
            $db = new Database();
            $sql = "UPDATE `RUTA` SET `SOLICITUD`= ? WHERE `idRUTA` LIKE ?";
            $query = $db->connect()->prepare($sql);
            $query->bindParam(1, $solicitud, PDO::PARAM_BOOL);
            $query->bindParam(2, $idRuta, PDO::PARAM_INT);
            $query->execute();
            
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
            return false;
        }
    }




}