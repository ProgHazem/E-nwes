<?php
namespace App\Models;

class Category extends \Core\Model
{
    public $id;
    public $name;

    public function save(){
        $query = "INSERT INTO enews.category (id, name) values(?,?)";
        $stm = static::$conn->prepare($query);
        $stm->execute([$this->id ,$this->name]);
    }
    /*
        * function to get article data from database
        * if $id == empty string return all article that status approved
        * else retu
        */
    public static function getAll(){
        $result = static::$conn->query("SELECT * FROM enews.category");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

}
?>