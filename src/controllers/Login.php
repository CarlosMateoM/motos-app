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

        $user = User::get_user($username);

        $hash_password = $user->getPassword();

        if(is_null($user)){
            header("location: /motos-app/login?login=incorrect_credentials&username=$username");
            exit();
        }

        if(password_verify($password, $hash_password)){
            session_start();
            $_SESSION['user'] = serialize($user);
            User::set_estado(true, $user->getId());
            header("location: /motos-app/home");
            exit();
        }else {
            header("location: /motos-app/login?login=wrong_password&username=$username");
        }
        

    }


}