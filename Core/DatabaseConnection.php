<?php

namespace Core;
/**
 * Class ConnectingDatabase
 * $server defined the server name and datatbase
 * $user defined user of database
 * $password defined paswword for the user
 */

class DatabaseConnection {
    private static $server = "mysql:localhost;dbname=enews";
    private static $user = "root";
    private static $pass = "Maged0502344773";
    private static $created = null;
    protected $conn = null;
    /*
     * function conenect() using to connecting datatbase
     */
    private function __construct(){}

    public static function getInstance(){
        if(self::$created === null){
            self::$created = new DatabaseConnection();
        }
        return self::$created;
    }

    public function connect(){
        try{
            $this->conn = new \PDO(self::$server, self::$user, self::$pass);
            return $this->conn;
        }
        catch(PDOException $e){
            echo "Error Connection ". $e->getmessage();
            //Eixt()
        }
    }
    public function closeConnection(){
        if (! is_null($this->conn)){
            $this->conn::close();
            $this->conn = null;
        }
    }
}
?>