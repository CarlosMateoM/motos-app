<?php

namespace Mateo\MotosApp\controllers;

use Mateo\MotosApp\lib\Controller;
use Mateo\MotosApp\models\User;

class Signup extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $id_power = $this->post('id_power');
        $id_identificacion = $this->post('id_identificacion');
        $username = $this->post('username');
        $name = $this->post('name');
        $phone = $this->post('telefono');
        $email = $this->post('email');
        $password = $this->post('password');
        $re_password = $this->post('re-password');

        if (
            empty($id_power) || empty($id_identificacion)
            || empty($username) || empty($name) || empty($email)
            || empty($password) || empty($re_password) || empty($phone)
        ) {
            header("location: /motos-app/signup?error=emptyfields");
        } else if (!is_numeric($id_identificacion)) {
            header("location: /motos-app/signup?error=id_wrong&idpower=$id_power&username=$username&email=$email&name=$name&telefono=$phone");
            exit();
        } else if (!preg_match("/^[a-zA-Z]*[0-9]*$/", $username)) {
            header("location: /motos-app/signup?error=username_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&telefono=$phone");
            exit();
        } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("location: /motos-app/signup?error=name_wrong&id=$id_identificacion&idpower=$id_power&email=$email&username=$username&telefono=$phone");
            exit();
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: /motos-app/signup?error=email_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&telefono=$phone");
            exit();
        } else if ($password !== $re_password) {
            header("location: /motos-app/signup?error=password_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username&telefono=$phone");
            exit();
        } else if (!preg_match("/3[0-9]{9}/", $phone)) {
            header("location: /motos-app/signup?error=phone_wrong&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&username=$username");
            exit();
        } else if(User::validate_username($username)){
            header("location: /motos-app/signup?error=username_unavailable&id=$id_identificacion&idpower=$id_power&email=$email&name=$name&telefono=$phone");
            exit();
        }

        $user = new User(
            $id_power,
            $id_identificacion,
            $username,
            $name,
            $phone,
            $email,
            $password
        );

        if($user->save()){
            header("location: /motos-app/signup?message=successfully");
        }else {
            echo 'something wrong';
        }


    }
}
