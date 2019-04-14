<?php

namespace App\Controllers;
use Core\View;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;

class UsersController extends \Core\BaseController{

    public function index(){
        $users = User::getAll();
        View::renderTemplate("home/index.html", ["users" => $users, 
                                                "is_logged" => isset($_SESSION['username'])? true: false]);
    }
    public function register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = new User($_POST["role"]);
            $f_name = filter_var(trim($_POST['f_name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $l_name = filter_var(trim($_POST['l_name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $userpass = filter_var(trim($_POST['userpass']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $validphone = filter_var(preg_match('/^01[0|1|2|5][0-9]{8}$/',$_POST['userphone'],$match1), FILTER_VALIDATE_INT);
            $gender = $_POST['gender'];
            $unique = User::geteMail($_POST['email']);
            if($unique == 0){
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                $validbirth = filter_var(preg_match('/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/',$_POST['birth'],$match2), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

                if(strlen($f_name)>=3 && strlen($l_name)>=3 && strlen($username) >= 5 && strlen($userpass) >= 3 && strlen($validphone) == 1 && ($gender == 'M' || $gender == 'F') && strlen($email) > 0 && strlen($validbirth) == 1){
                    $user->f_name = $f_name;
                    $user->l_name = $l_name;
                    $user->username = $username;
                    $user->userpass = $userpass;
                    $user->userphone = $match1[0];
                    $user->gender = $gender;
                    $user->email = $email;
                    $user->birth = $match2[0];
    //                print_r($user);
                    if($user->save()){
                        $_SESSION["username"] = $user->username;
                        $_SESSION["role"] = $user->user_role;
                        header("Location: /mvc/public/home");
                    }
                }
            }
            header("Location: /mvc/public/register");
        }
        else
            View::renderTemplate("users/register.html", ["is_logged" => isset($_SESSION['username'])]);

    }
    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($result = User::is_user_authenticated($_POST["email"], $_POST["password"])){
                $_SESSION["username"] = $result->username;
                $_SESSION["role"] = $result->user_role;
                header("Location: /mvc/public/home");
            }
            header("Location: /mvc/public/home");
        }
        else
            View::renderTemplate("users/login.html");

    }
    
    public function logout(){
            unset($_SESSION["username"]);
            unset($_SESSION["role"]);
            header("Location: /mvc/public/home");
    }

    public function showProfile(){
        if(isset($_SESSION["username"])){
            if($user = User::getByUsername($_SESSION["username"])){
                $categories = Category::getAll();
                $approved = Article::getByStatus("Aprove");
                $pending = Article::getByStatus("Pending");
                View::renderTemplate("users/profile.html", ["is_logged" => true,
                "categories" => $categories,
                "role" => $user->role,
                "user" => $user,
                "approved" => $approved,
                "pending" => $pending]);
            }
        }
    }
    public function getuserstatus($status, $role)
    {
        return User::getuserbystatusandrole($status, $role);
    }

    public function getjournaliststatus($status, $role)
    {
        return User::getjournaliststatusandrole($status, $role);
    }

    public function block($id)
    {
        return User::blockUser($id);
    }

    public function del($id)
    {
        return User::deleteUser($id);
    }

    public function update($id)
    {
        return User::approveUser($id);
    }


    ///////////////////////////////////////
    public function getBlockeduser()
    {
        return BlockedUser::getusers();
    }


    ////////////////////////////////////////
    public function delfromblocked($id)
    {
        return BlockedUser::deleteUser($id);

    }

    public function getall()
    {
        return User::get();
    }

    public function adminView(){
        $userall = $user->getall();
        $userPending = $user->getuserstatus("Pending", "U");
        $userApprove = $user->getuserstatus("Aprove", "U");
        $userBlock = $user->getuserstatus("Block", "U");
        $approveduserpercent = floor((count($userApprove)/count($userall))*100);
        $pendinguserpercent = floor((count($userPending)/count($userall))*100);
        $blockuserpercent = floor((count($userBlock)/count($userall))*100);
        $approvedjournpercent = floor((count($journalistApprove)/count($userall))*100);
        $pendingjournpercent = floor((count($userPending)/count($userall))*100);
        
    }

}

?>