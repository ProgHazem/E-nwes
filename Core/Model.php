<?php
namespace Core;

require ROOT_DIR . "/Core/DatabaseConnection.php";

class Model{
    public static $conn;



}
Model::$conn = DatabaseConnection::getInstance();

?>