<?php
require_once "../models/Comment.php";

class CommentController{

    public function addcomment(){
        if(isset($_POST['add']))
        {
            $comment = new Comment();
            $comment->user_id = $_COOKIE['id'];
            $comment->artical_id = $_POST['artical_id'];
            $comment->content = $_POST['content'];
            //print_r($comment);
            $comment->save();
        }
    }
    public function showcomments()
    {
        $comment = new Comment();
        $comment->artical_id = $_GET['id'];
        return $comment->get($comment->artical_id);
    }
}

?>