<?php
    require_once "./Model.php";

    class Comment extends Model
    {
        public $artical_id;
        public $user_id;
        public $date_comment;
        public $content;
        /*
         * function to save article data in database
         */
        public function save()
        {
            $commentcon = $this->conn->conenect();
            $query = "insert into enewspaper.comment (artical_id,user_id,date_comment,content) values(?,?,?,?)";
            $stm = $commentcon->prepare($query);
            $stm->execute([$this->artical_id, $this->user_id, date("Y-m-d H:i:s"), $this->content]);
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
                $result = $commentcon->query("select * from enewspaper.comment where artical_id= '{$id}' ");
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        }
    }
?>