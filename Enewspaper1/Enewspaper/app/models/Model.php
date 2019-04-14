<?php

require_once "../libs/DatabaseConnection.php";

class Model{
    protected $conn;

    public function __construct(){
        $this->conn = DatabaseConnection::conenect();
    }

}


?>