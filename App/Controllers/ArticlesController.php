<?php
namespace App\Controllers;
use Core\View;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
class ArticlesController extends \Core\BaseController{


    public function showAction(){
        $article = Article::getByID($this->route_params["id"]);
        $categories = Category::getAll();
        if(isset($_SESSION['username'])){
            $userrole = $_SESSION['role'];
            $username = $_SESSION['username'];
        }
        else $userrole = false;
        if($article && $article->status_art === "Aprove"){
            $comments = Comment::getByArticleID($this->route_params["id"]);
            View::renderTemplate("articles/show.html", ["article" => $article, "comments" => $comments,
                                                        "is_logged" => isset($_SESSION['username'])? true: false,
                                                        "categories" => $categories,
                                                        "role" => $userrole]);
        }
        else  View::renderTemplate("articles/show.html", ["is_logged" => isset($_SESSION['username'])? true: false,
                                                          "categories" => $categories,
                                                          "role" => $userrole,
                                                          "username" => $username]);
             
    }
    
    public function newAction(){
        if(isset($_SESSION["username"]) && $_SESSION["role"] = "J"){
            $userrole = $_SESSION['role'];
            $username = $_SESSION['username'];
            $categories = Category::getAll();
            $errors = [];
            if(isset($_GET["errors"])){
                $errors = $_GET["errors"];
            }
            View::renderTemplate("articles/new.html", ["is_logged" => isset($_SESSION['username'])? true: false,
            "categories" => $categories,
            "role" => $userrole,
            "username" => $username,
            "categories" => $categories,
            "errors" => $errors]);
        }
        else header("Location:http://localhost/mvc/public/login");
    }

    public function addAction(){
        if($_SERVER["REQUEST_METHOD"] = "POST"){
            if(isset($_SESSION["username"])){
                if(isset($_POST['title_p']) && isset($_POST['body_p'])){
                    if (!empty($_POST["title_p"])&& !empty($_POST['body_p'])){
                        $title_p = $_POST['title_p'];
                        $body_p = $_POST['body_p'];
                        $cat_id = $_POST['category'];
                        //handle file
                        $name_img = $_FILES['fileToUpload']['name'];
                        $size = $_FILES['fileToUpload']['size'];
                        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                        $type = $_FILES['fileToUpload']['type'];
                        $img_error = $_FILES['fileToUpload']['error'];
                        $temp_name = $_FILES['fileToUpload']['tmp_name'];
                        $error = array();
                        $allowed_exe = array('jpg','gif','jpeg','png');
                        $img_extention = explode(".",$_FILES["fileToUpload"]["name"]);
                        $img_extention = strtolower((end($img_extention)));
                        // echo $_SERVER['DOCUMENT_ROOT'];
                        if($img_error == 4)
                            $error[]="Not file choose";
                        else{

                            if($size>80000)
                                $error[]="can`t upload this size choose else small";
                            if(! in_array($img_extention, $allowed_exe))
                                $error[]="can`t upload this exe file";
                        }

                       if(empty($error)){
                            $destination_path = getcwd().DIRECTORY_SEPARATOR;
                            $target_path = $destination_path . basename( $_FILES["fileToUpload"]["name"]);
                            @move_uploaded_file($temp_name, $target_path);
                            //move_uploaded_file($temp_name, $_SERVER['DOCUMENT_ROOT']. "/mvc/public/media/article_images/" .$name_img);
                            $article = new Article();
                            $article->title = $title_p;
                            $article->body = $body_p;
                            $article->date_artical = date('Y-m-d');
                            $article->status_art = "Pending";
                            $article->user_id = (User::getID($_SESSION["username"]))->id;
                            $article->cat_id = $cat_id;
                            $article->image = $name_img;
                            $article->save();
                            header("Location: /mvc/public/articles/{$article->id}");
                        }
                        else{
                            $errors = \implode(", ", $errors);
                            header("Location: /mvc/public/articles/new/?errors=". $errors);
                        }
                        
                        
                        /* $result = static::$conn->query("INSERT INTO artical (title,body,image) values ('{$title_p}','{$body_p}','{$name_img}')");
                        $last_id = mysqli_insert_id($conn); 
                        // echo $last_id;
                        $result = mysqli_query($conn,$query);
                        // header("location:profile.php");  */
                    }
                }
            }
            
        }
    }

    public function deleteAction(){
        if(isset($_SESSION["role"]) && $_SESSION["role"] == "A"){
            Article::delete($this->route_params["id"]);
            header("Location: /admin/dashboard");
        }
        header("Location: /home");

    }

    public function editAction(){
        echo "Editig form for article {$id}";
        echo "<pre>";
        echo htmlspecialchars(print_r($this->route_params));
        echo "</pre>";
    }

    public function updateAction(){
        echo "Updating the article with id {$id}";
    }

    public function addComment(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_SESSION["username"])){
                $comment = new Comment();
                $user_id = User::getID($_SESSION["username"])->id;
                $comment->artical_id = $this->route_params["id"];
                $comment->user_id = $user_id;
                $comment->date_comment = date('Y-m-d');
                $comment->content = $_POST["comment"];
                $comment->save();
                header("Location: http://localhost/mvc/public/articles/{$comment->artical_id}");
            }
            else headerheader("Location: http://localhost/mvc/public/login");
        }
    }

    public function categoryView(){
        $articles = Article::getByCategory($this->route_params["categoryname"]);
        $categories = Category::getAll();
        if(isset($_SESSION['username'])){
            $userrole = $_SESSION['role'];
            $username = $_SESSION['username'];
        }
        else $userrole = false;
        View::renderTemplate("articles/category.html", ["article" => $article,
                                                        "is_logged" => isset($_SESSION['username'])? true: false,
                                                        "articles" => $articles,
                                                        "categories" => $categories,
                                                        "role" => $userrole,
                                                        "username" => $username]);
        }
             

}

?>