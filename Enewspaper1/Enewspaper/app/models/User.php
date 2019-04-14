<?php
    require_once "Model.php";

    class User extends Model
    {
        public $id;
        public $f_name;
        public $l_name;
        public $username;
        public $userpass;
        public $userphone;
        public $gender;
        public $email;
        public $birth;
        public $role_user;
        public $status_user = "Pending";

        public function __construct($role = "U"){
            $this->role_user = $role;
        }

        public function save(){
            $usercon = new Model;
            $usercon = $usercon->conn;
            $query = "insert into enewspaper.user (f_name,l_name,username,userpass,userphone,gender,email,birth,role_user) values(?,?,?,?,?,?,?,?,?)";
            $stm = $usercon->prepare($query);
            $stm->execute([$this->f_name, $this->l_name, $this->username,$this->userpass, $this->userphone, $this->gender,$this->email, $this->birth, $this->role_user]);
        }

        public function get($status = null){
            $usercon = new Model;
            $usercon = $usercon->conn;
            if(!$status)
                $result = $usercon->query("select * from enewspaper.user");
            else
                $result = $usercon->query("select * from enewspaper.user where status_user = {$status}");
            if ($result)
                return $result->fetchAll(PDO::FETCH_ASSOC);
            return null;
        }
        public function Get_Data($username,$role){
            $usercon = new Model;
            $usercon = $usercon->conn;
            $result = $usercon->query("select * from enewspaper.user where username = '{$username}' and role_user='{$role}'");
            return $result->fetch(PDO::FETCH_ASSOC);
      
        }
        public function getuser($email, $password){
            $usercon = new Model;
            $usercon = $usercon->conn;
            $result = $usercon->query("select * from enewspaper.user where email = '{$email}' and userpass = '{$password}'");
            if($result)
            {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
            else
            {
                echo "<script>alert('This user Not Found')</script>";
                header("Location: ../views/index.php");
            }
        }


        public function getemail($email)
        {
            $usercon = new Model;
            $usercon = $usercon->conn;
            $result = $usercon->query("select * from enewspaper.user where email = '{$email}'");
            $result->fetch(PDO::FETCH_ASSOC);
            return $result->rowCount();
        }

        public function getuserbystatusandrole($status, $role){
            $usercon = new Model;
            $usercon = $usercon->conn;
            $result = $usercon->query("select * from enewspaper.user where status_user = '{$status}' and  role_user = '{$role}'");
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

        public function getjournaliststatusandrole($status, $role){
            $usercon = new Model;
            $usercon = $usercon->conn;
            $result = $usercon->query("select * from enewspaper.user where status_user = '{$status}' and  role_user = '{$role}'");
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

        public function blockUser($id)
        {
            $usercon = new Model;
            $usercon = $usercon->conn;
            $usercon->query("update enewspaper.user set status_user = 'Block' where id = $id");
            $usercon->query("insert into enewspaper.blocked_user values ($id,date('Y-m-d', strtotime('+30 days')))");
        }

        public function approveUser($id)
        {
            $usercon = new Model;
            $usercon = $usercon->conn;
            $usercon->query("update enewspaper.user set status_user = 'Aprove' where id = $id");
        }

        public function deleteUser($id)
        {
            $usercon = new Model;
            $usercon = $usercon->conn;
            $usercon->query("delete from enewspaper.user where id = $id");
        }

        public static function filter(){

        }
    }

class BlockedUser extends Model
{
    public $user_id;
    public $date;
    public function getusers()
    {
        $blockusercon = new Model;
        $blockusercon = $blockusercon->conn;
        $result = $blockusercon->query("select * from enewspaper.blocked_user");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $usercon = new Model;
        $usercon = $usercon->conn;
        $usercon->query("delete from enewspaper.blocked_user where id = $id");
    }
}

?>