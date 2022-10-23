<?php

namespace Mateo\MotosApp\controllers;

use Mateo\MotosApp\lib\Controller;
use Mateo\MotosApp\models\User;


class Login extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate(){

        $username = $this->post('username');
        $password = $this->post('password');

        if (empty($username) || empty($password)) {
            header("location: ./../login.php?login=empty");
            exit();
        }

        $user = User::getUser($username);
        
        if($user->getId() == -1){
            header("location: /motos-app/login?login=incorrect_credentials&username=$username");
            exit();
        }

        $hash_password = $user->getPassword();
        
        if(password_verify($password, $hash_password)){
            session_start();
            $_SESSION['user'] = serialize($user);
            User::setUserEstado(true, $user->getId());
            header("location: /motos-app/home");
            exit();
        }else {
            header("location: /motos-app/login?login=incorrect_credentials&username=$username");
        }
        

    }


}