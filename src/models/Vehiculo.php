<?php

namespace Mateo\MotosApp\models;

use PDO;
use PDOException;
use Mateo\MotosApp\lib\Model;
use Mateo\MotosApp\lib\Database;


class User extends Model
{
    private int $idVehiculo;
    private int $idEstudiante;
    private string $placa;    
    private string $marca;    
    private string $color;
    private string $tipo;    

    public function __construct(
        int $idEstudiante,
         string $placa,
          string $marca,
           string $color,
            string $tipo
    )
    {
        $this->idVehiculo = -1;
        $this->idEstudiante = $idEstudiante;
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->tipo = $tipo;
    }

    public function save()
    {
        try {

            $sql = "INSERT INTO `VEHICULO`(`ESTUDIANTE_idESTUDIANTE`, `PLACA`, `TIPO`, `MARCA`, `COLOR`) VALUES (?, ?, ?, ?, ?)";
            
            $query = $this->prepare($sql);

            $query->bindParam(1, $this->idEstudiante, PDO::PARAM_INT);
            $query->bindParam(2, $this->placa, PDO::PARAM_STR);
            $query->bindParam(3, $this->tipo, PDO::PARAM_STR);
            $query->bindParam(4, $this->marca, PDO::PARAM_INT);
            $query->bindParam(5, $this->color, PDO::PARAM_STR);
            
            $query->execute();

            if($query){
                return true;
            }

        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw $e;
            return false;
        }
    }




}