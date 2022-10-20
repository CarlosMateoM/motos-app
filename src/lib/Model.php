<?php

namespace Mateo\MotosApp\lib;

class Model {
   
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function query($query){
        return $this->db->connect()->query($query);
    }

    public function prepare($query){
        return $this->db->connect()->prepare($query);
    }

}