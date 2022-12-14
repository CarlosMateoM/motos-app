<?php

use Mateo\MotosApp\controllers\Signup;
use Mateo\MotosApp\controllers\Login;
use Mateo\MotosApp\controllers\Home;
use Mateo\MotosApp\models\User;

require_once __DIR__ . './../../vendor/autoload.php';

$router = new \Bramus\Router\Router();

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './../../config');
$dotenv->load();

function require_authentication(){
    if(!isset($_SESSION['user'])){
        header('location: login');
        exit();
    }
}

$router->get('/', function(){
   header('location: home');
});


$router->get('/signup', function(){
    $controller = new Signup;
    $controller->render('signup/index'); 
});

$router->post('/createaccount', function(){
    $controller = new Signup;
    $controller->register();
});

$router->get('/login', function(){
    $controller = new Login;
    $controller->render('login/index');
});

$router->post('/authenticate', function(){
    $controller = new Login;
    $controller->authenticate();
});

$router->get('/home', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    $controller->render('home/index');
});

$router->post('/home/activeUsers', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    echo $controller->getUserConnectedToWork();
});

$router->post('/logout', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    $controller->log_out();
});

$router->post('/saveVehicle', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    $controller->saveVehicle();
});

$router->post('/sendRequestService', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    $controller->sendRequestService();
});

$router->post('/receiveServiceRequest', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    echo $controller->receiveServiceRequest();
});


$router->post('/respondToServiceRequest', function(){
    require_authentication();
    $controller = new Home(unserialize($_SESSION['user']));
    echo $controller->respondToServiceRequest();
});





$router->run(); 