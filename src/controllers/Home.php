<?php

namespace Mateo\MotosApp\controllers;

use Mateo\MotosApp\lib\Controller;
use Mateo\MotosApp\models\User;
use Mateo\MotosApp\models\Vehicle;

class Home extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }


    public function log_out() {
        $id =  $this->user->getId();
        User::setUserEstado(false, $id);
        unset($_SESSION['user']);
        header('location: home');
    }

    public function saveVehicle()
    {
        $idEstudiante = $this->user->getId();
        $placa = $this->post('placa');
        $marca = $this->post('marca');
        $color = $this->post('color');
        $tipo = $this->post('tipo');
        $servicio = $this->post('servicio');

        if (empty($placa) || empty($marca) || empty($color)
            || empty($tipo) || empty($servicio)) {
            header("location: /motos-app/home?vehicle=empty");
            exit();
        }

        $vehicle = new Vehicle(
            $idEstudiante,
            $placa,
            $marca,
            $color,
            $tipo
        );

        if($vehicle->save()){
            User::setServicio($servicio, $idEstudiante);
            header("location: /motos-app/home?vehicle=success");
        }


        
    }

    public function getUserConnectedToWork():string
    {
        return User::getUsersConnectedToWork();
    }

    public function sendRequestService()
    {
        $id = $this->post('id');
        return User::sendRequestService($this->user->getId(), $id);
    }

    public function receiveServiceRequest():int
    {
        return User::receiveServiceRequest($this->user->getId());
    }

    public function respondToServiceRequest()
    {
        return User::respondToServiceRequest(false, $this->user->getId());
    }



}