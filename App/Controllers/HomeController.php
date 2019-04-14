<?php

namespace App\Controllers;
use Core\View;
use App\Models\Article;
use App\Models\Category;
class HomeController extends \Core\BaseController{

    public function index(){
        $articles = Article::getByStatus("Aprove");
        $categories = Category::getAll();
        if(isset($_SESSION['username'])){
            $userrole = $_SESSION['role'];
            $username = $_SESSION['username'];
        }
        else $userrole = false;
        View::renderTemplate("home/index.html", ["articles" => $articles, 
        "is_logged" => isset($_SESSION['username'])? true: false,
        "categories" => $categories,
        "role" => $userrole,
        "username" => $username]);
    }
}

?>