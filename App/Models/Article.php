<?php
namespace App\Models;

class Article extends \Core\Model
{
    public $id;
    public $image;
    public $title;
    public $body;
    public $date_artical;
    public $status_art;
    public $user_id;
    public $cat_id;

    public function __construct($satatus = "Pending")
    {
        $this->status_art = $satatus;
    }
    /*
        * function to save article data in database
        */
    public function save(){
        $query = "INSERT INTO enews.artical (image,title,body,date_artical,status_art,user_id,cat_id) values(?,?,?,?,?,?,?)";
        $stm = static::$conn->prepare($query);
        $stm->execute([$this->image, $this->title, $this->body, $this->date_artical, $this->status_art, $this->user_id, $this->cat_id]);
        $this->id = static::$conn->lastInsertId();
        return true;
    }
    /*
        * function to get article data from database
        * if $id == empty string return all article that status approved
        * else retu
        */
    public static function getAll(){
        $result = static::$conn->query("SELECT a.*, u.username username FROM enews.artical a INNER JOIN enews.user u ON u.id = a.user_id");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function getByID($id){
        $result = static::$conn->query("SELECT a.*, u.username username FROM enews.artical a INNER JOIN enews.user u ON u.id = a.user_id WHERE a.id = {$id}");
        $result = $result->fetch(\PDO::FETCH_OBJ);
        if($result)
            return $result;
        return null;
    }
    public static function getByCategory($category){
        $result = static::$conn->query("SELECT a.* FROM enews.artical a INNER JOIN enews.category c ON c.id = a.cat_id WHERE c.name = '{$category}' AND a.status_art = 'Aprove'");
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        if($result)
            return $result;
        return null;
    }
    public static function getByStatus($status = "Aprove"){
        if ($status === "Aprove") {
            $result = static::$conn->query("SELECT * FROM enews.artical WHERE status_art = 'Aprove'");
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        } else if($status === "Pending") {
            $result = static::$conn->query("SELECT * FROM enews.artical WHERE status_art = 'Pending'");
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = static::$conn->query("SELECT * FROM enews.artical WHERE status_art = 'Block'");
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function update(){
        static::$conn->query("UPDATE enews.artical SET image='{$this->image}',title='{$this->title}', body='{$this->body}', date_artical='{$this->date_artical}', status_art= 'pending', user_id='{$this->user_id}',cat_id = '{$this->cat_id}' WHERE id='{$this->id}'");
    }
    public function delete($id){
        static::$conn->query("DELETE FROM enews.artical WHERE id = '{$id}'");
    }


}
?>