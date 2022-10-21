<?php

namespace Mateo\MotosApp\controllers;

use Mateo\MotosApp\lib\Controller;
use Mateo\MotosApp\models\User;

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
        User::set_estado(false, $id);
        unset($_SESSION['user']);
        header('location: home');
    }



}