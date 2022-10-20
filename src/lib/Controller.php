<?php


namespace Mateo\MotosApp\lib;

use Mateo\MotosApp\lib\View;


class Controller {

    private  View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $name, array $data = []){
        $this->view->render($name, $data);
    }

    public function post(string $param){
        if(!isset($_POST[$param])){
            return null;
        }
        return $_POST[$param];
    }

    public function get(string $param){
        if(!isset($_GET[$param])){
            return null;
        }
        return $_GET[$param];
    }

    public function file(string $param){
        if(!isset($_FILES[$param])){
            return null;
        }
        return $_FILES[$param];
    }

}