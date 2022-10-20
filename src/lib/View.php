<?php 

namespace Mateo\MotosApp\lib;

class View {
    
    function render(string $name, array $data = []){
        $this->d = $data;
        require 'src/views/'. $name . '.php';

    }
}