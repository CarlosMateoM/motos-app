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


}