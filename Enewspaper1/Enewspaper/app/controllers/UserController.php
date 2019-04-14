<?php
require_once "../models/User.php";

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

class UserController{

    public function register(){
        if(isset($_POST['add']))
        {
            $user = new User($_POST["role"]);
            $f_name = filter_var(trim($_POST['f_name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $l_name = filter_var(trim($_POST['l_name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $userpass = filter_var(trim($_POST['userpass']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $validphone = filter_var(preg_match('/^01[0|1|2|5][0-9]{8}$/',$_POST['userphone'],$match), FILTER_VALIDATE_INT);
            $gender = $_POST['gender'];
            $unique = $user->getemail($_POST['email']);
            if($unique == 0){
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            }
            $validbirth = filter_var(preg_match('/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/',$_POST['birth'],$matchh), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $user->f_name = $f_name;
            $user->l_name = $l_name;
            $user->username = $username;
            $user->userpass = $userpass;
            $user->userphone = $match[0];
            $user->status_user = $user->status_user;
            $user->gender = $gender;
            $user->email = $email;
            $user->birth = $matchh[0];
            if(strlen($f_name)>=3 && strlen($l_name)>=3 && strlen($username) >= 5 && strlen($userpass) >= 3 && strlen($validphone) == 1 && ($gender == 'M' || $gender == 'F') && strlen($email) > 0 && strlen($validbirth) == 1)
            {
                $user->f_name = $f_name;
                $user->l_name = $l_name;
                $user->username = $username;
                $user->userpass = $userpass;
                $user->userphone = $match[0];
                $user->status_user = $user->status_user;
                $user->gender = $gender;
                $user->email = $email;
                $user->birth = $matchh[0];
//                print_r($user);
                $user->save();
            }
            else
            {
//                print_r($user);
                header("Location: ../views/index.php");
            }
        }
    }
    public function login(){
        if(isset($_POST['login']))
        {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $result = User::getuser($email, $password);
//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
            if ($result['role_user'] == 'A')
            {
                session_start();
                $_SESSION['username'] = $result['username'];
                header("Location:../views/controlpanelAdmin.php");
            }
            elseif ($result['role_user'] == 'J' && $result['status_user'] == 'Aprove')
            {
                session_start();
                $_SESSION['username'] = $result['username'];
                echo $_SESSION['username'];
                header("Location:../views/profile.php?username=$_SESSION['username']");
            }
            elseif ($result['role_user'] == 'U' && $result['status_user'] == 'Aprove')
            {
                session_start();
                $_SESSION['username'] = $result['username'];
                header("Location:../views/index.php");
            }
            else
            {
                echo "<script>alert('This user Not Found Or Admin Not Approve it')</script>";
                header("Location: ../views/index.php");
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

    public function getData($username,$role='J')
    {
        return User::Get_Data($username,$role);
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

}
    if(isset($_POST['login']))
    {
        $user = new UserController();
        $user->login();
    }

    if(isset($_POST['add']))
    {
        $user = new UserController();
        $user->register();
    }


    /*
     * return user where status and role == user
     */

    $user = new UserController();
    $userall = $user->getall();
    $userPending = $user->getuserstatus("Pending", "U");
    $userApprove = $user->getuserstatus("Aprove", "U");
    $userBlock = $user->getuserstatus("Block", "U");
//    echo "<pre>";
//    print_r($userPending);
//    print_r($userApprove);
//    print_r($userBlock);
//    echo "</pre>";



        /*
         * return user where status and role == user
         */

        $journalist = new UserController();
        $journalistPending = $user->getjournaliststatus("Pending", "J");
        $journalistApprove = $user->getjournaliststatus("Aprove", "J");
        //    echo "<pre>";
        //    print_r($journalistPending);
        //    print_r($journalistApprove);
        //    echo "</pre>";


        /*
         * update date user status to block
         */

        if (isset($_GET['idapproveblock']))
        {
            $id = $_GET['idapproveblock'];
            $user = new UserController();
            $user->block($id);
            header("Location: ../views/controlpanelAdmin.php");

        }

        /*
         * update date user status to approve
         */

        if (isset($_GET['idapprove']))
        {
            $id = $_GET['idapprove'];
            $user = new UserController();
            $user->update($id);
            header("Location: ../views/controlpanelAdmin.php");

        }

        /*
         * delete date user status
         */

        if (isset($_GET['iddel']))
        {
            $id = $_GET['iddel'];
            $user = new UserController();
            $user->del($id);
            header("Location: ../views/controlpanelAdmin.php");

        }



        /*
         * Blocked user
         */
        $blocked_user = new UserController();
        $blocked = $blocked_user->getBlockeduser();


        // un blocked
        if (isset($_GET['iddelfromblocktable'])) {
            $user = new UserController();
            $id = $_GET['iddelfromblocktable'];
            $user->delfromblocked($id);
            $user->update($id);
            header("Location: ../views/controlpanelAdmin.php");
        }

        // if (isset($_GET['username'])) {
            $user = new UserController();
             //$user_data=$_GET['username'];
            $profile_user=$user->getData($_SESSION['username']);

        // }

?>
