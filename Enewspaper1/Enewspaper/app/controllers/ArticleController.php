<?php
require_once "../models/Article.php";

class ArticleController{

    public function addarticle(){
        if(isset($_POST['add']))
        {
            $article = new Article();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=explode("/",$_FILES["image"]["type"]);
            $file_ext=strtolower((end($file_ext)));
            $extensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions)){
                if(move_uploaded_file($file_tmp,"../public/image/".$file_name)){
                }
                else
                    {
                    echo "Failed";
                }
            }
            else
            {
                echo "ERRor Loading";
            }
            $article->image = $file_name;
            $article->title = $_POST['title'];
            $article->body = $_POST['body'];
            $article->date_artical = $_POST['date_artical'];
            $article->status_art = $_POST['status_art'];
            $article->user_id = $_COOKIE['user_id'];
            $article->cat_id = $_POST['cat_id'];
            //print_r($article);
            $article->save();
        }
    }
    public function getarticalstatus($status)
    {
        return Article::getAllarticalstatus($status);
    }
}

        /*
         * return arical where status and role == user_id
         */

        $articals = new ArticleController();
        $articalPending = $articals->getarticalstatus("Pending");
        $articalApprove = $articals->getarticalstatus("Aprove");
//        echo "<pre>";
//        print_r($articalPending);
//        print_r($articalApprove);
//        echo "</pre>";
?>
