<?php
    require_once "Model.php";

    class Article extends Model
    {
        public $id;
        public $image;
        public $title;
        public $body;
        public $date_artical;
        public $status_art;
        public $user_id;
        public $cat_id;

        public function __construct($satatus = "pending")
        {
            $this->status_art = $satatus;
        }
        /*
         * function to save article data in database
         */
        public function save()
        {
            $articalcon = $this->conn->conenect();
            $query = "insert into enewspaper.artical (image,title,body,date_artical,status_art,user_id,cat_id) values(?,?,?,?,?,?,?)";
            $stm = $articalcon->prepare($query);
            $stm->execute([$this->image, $this->title, $this->body, $this->date_artical, $this->status_art, $this->user_id, $this->cat_id]);
        }
        /*
         * function to get article data from database
         * if $id == empty string return all article that status approved
         * else retu
         */
        public function get($id = "")
        {
            $articalcon = $this->conn->conenect();
            if ($id == "") {
                $result = $articalcon->query("select * from enewspaper.artical where status_art= 'Aprove'");
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else if($idd = $id) {
                $result = $articalcon->query("select * from enewspaper.artical where status_art= 'pending' and id = {$idd}");
                return $result->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = $articalcon->query("select * from enewspaper.artical where status_art= 'pending' ");
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        public function update()
        {
            $articalcon = $this->conn->conenect();
            $articalcon->query("update enewspaper.artical set image='{$this->image}',title='{$this->title}', body='{$this->body}', date_artical='{$this->date_artical}', status_art= 'pending', user_id='{$this->user_id}',cat_id = '{$this->cat_id}' where id='{$this->id}'");
        }
        public function delete($id = "")
        {
            $articalcon = $this->conn->conenect();
            $articalcon->query("Delete from enewspaper.artical where id = '{$id}'");
        }

        public function getAllarticalstatus($status){
            $articalcon = new Model;
            $articalcon = $articalcon->conn;
            $result = $articalcon->query("select * from enewspaper.artical where status_user = '{$status}'");
            if($result)
            {
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                echo "<script>alert('This user Not Found')</script>";
                header("Location: ../views/index.php");
            }
        }
    }
?>