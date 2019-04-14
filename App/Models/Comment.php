<?php
namespace App\Models;

    class Comment extends \Core\Model
    {
        public $artical_id;
        public $user_id;
        public $date_comment;
        public $content;
        /*
         * function to save article data in database
         */
        public function save(){
            $query = "INSERT into enews.comment (atrical_id,user_id,date_comment,content) values(?,?,?,?)";
            $stm = static::$conn->prepare($query);
            $stm->execute([$this->artical_id, $this->user_id, $this->date_comment, $this->content]);
        }
        public static function getByArticleID($id){
            $result = static::$conn->query("SELECT c.*, u.username as username FROM enews.comment c INNER JOIN enews.user u ON u.id = c.user_id WHERE atrical_id = {$id}");
            $result = $result->fetchAll(\PDO::FETCH_ASSOC);
            if($result)
                return $result;
            return false;
        }
        /*
         * function to get article data from database
         * if $id == empty string return all article that status approved
         * else return Null
         */
        public function get($art_id = "")
        {
            $commentcon = $this->conn->conenect();
            if ($id = $art_id) {
                $result = $commentcon->query("select * from enews.comment where artical_id= '{$id}' ");
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        }
    }
?>