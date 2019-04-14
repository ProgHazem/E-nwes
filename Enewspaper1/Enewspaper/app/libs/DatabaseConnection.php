<?php

/**
 * Class ConnectingDatabase
 * $server defined the server name and datatbase
 * $user defined user of database
 * $password defined paswword for the user
 */

class DatabaseConnection 
{
    private static $server = "mysql:localhost;dbname=enewspaper";
    private static $user = "iti";
    private static $pass = "reham";
    /*
     * function conenect() using to connecting datatbase
     */
    public static function conenect()
    {
        try
        {
            $conn = new PDO(self::$server, self::$user, self::$pass);
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Error Connection ". $e->getmessage();
        }
    }
    /*
     * function closeConnection() using to closing datatbase
     */
    public function closeConnection()
    {
        $this->conn = null;
    }
}
?>