<?php
namespace App\Models;

class User extends \Core\Model{
    public $id;
    public $f_name;
    public $l_name;
    public $username;
    public $userpass;
    public $userphone;
    public $gender;
    public $email;
    public $birth;
    public $user_role;
    public $user_status = "Pending";

    public function __construct($role = "U"){
        $this->user_role = $role;
    }

    public function save(){
        $result = static::$conn->query("SELECT username FROM enews.user WHERE username = '{$this->username}'");
        if($result->fetch(\PDO::FETCH_OBJ))
            return false;
        var_dump($result);
        $query = "INSERT INTO enews.user (f_name,l_name,username,userpass,userphone,gender,email,birth,user_role, user_status) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stm = static::$conn->prepare($query);
        $stm->execute([$this->f_name, $this->l_name, $this->username,$this->userpass, $this->userphone, $this->gender,$this->email, $this->birth, $this->user_role, $this->user_status]);
        return true;
    }

    public static function getAll(){
        $result = static::$conn->query("SELECT * FROM enews.user");
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        if($result)
            return $result;
        return null;
    }

    public static function getByStatus($status = null){
        if(!$status)
            $result = static::$conn->query("SELECT * FROM enews.user");
        else{
            $result = static::$conn->query("SELECT * FROM enews.user WHERE user_status = '{$status}'");
            $result = $result->fetch(\PDO::FETCH_OBJ);
        }
        if($result)
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        return null;
    }
    public static function getID($username){
        $result = static::$conn->query("SELECT id FROM enews.user WHERE username = '{$username}'");
        $result = $result->fetch(\PDO::FETCH_OBJ);
        if($result)
            return $result;
        return null;
    }
    public static function getByID($id){
        $result = static::$conn->query("SELECT * FROM enews.user WHERE id = '{$id}'");
        $result = $result->fetch(\PDO::FETCH_OBJ);
        if($result)
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        return null;
    }
    public static function getByUsername($username){
        $result = static::$conn->query("SELECT * FROM enews.user WHERE username = '{$username}'");
        $result = $result->fetch(\PDO::FETCH_OBJ);
        if($result)
            return $result;
        return null;
    }

    public static function is_user_authenticated($email, $pass){
        $result = static::$conn->query("SELECT * FROM enews.user WHERE email = '{$email}' AND userpass = '{$pass}'");
        $result = $result->fetch(\PDO::FETCH_OBJ);
        if($result)
            return $result;
        return false;
    }
    
    public function is_authenticated(){
        return static::is_user_authenticated($this->username, $this->password);
    }

    public static function getPending(){
        return static::getByStatus("Pending");
    }
    public static function getApproved(){
        return static::getByStatus("Aprove");
    }
    public static function getBlocked(){
        return static::getByStatus("Block");
    }
    public static function getStatus($id){
        $result = static::$conn->query("SELECT user_status FROM enews.user WHERE id = {$id}");
        return $result;
    }
    public static function geteMail($email){
        $result = static::$conn->query("SELECT * FROM enews.user WHERE email = '{$email}'");
        $result->fetch(\PDO::FETCH_ASSOC);
        return $result->rowCount();
    }

    public static function blockUser($id){
        static::$conn->query("UPDATE enews.user SET status_user = 'Block' WHERE id = $id");
        static::$conn->query("INSERT INTO enews.blocked_user values ($id,date('Y-m-d', strtotime('+30 days')))");
    }

    public static function approveUser($id){
        static::$conn->query("UPDATE enews.user SET user_status = 'Aprove' WHERE id = $id");
    }

    public static function deleteUser($id){
        static::$conn->query("DELETE FROM enews.user WHERE id = $id");
    }
    public static function removeBlock($id){
        static::$conn->query("DELETE FROM enews.blocked_user WHERE id = $id");
    }
    public function getuser($email, $password){
        $result = static::$conn->query("select * from enews.user where email = '{$email}' and userpass = '{$password}'");
        if($result)
            return $result->fetch(PDO::FETCH_ASSOC);
        else
            header("Location: ../views/index.php");
    }

    public function getuserbystatusandrole($status, $role){
        $result = static::$conn->query("select * from enews.user where status_user = '{$status}' and  role_user = '{$role}'");
        if($result)
            return $result->fetchAll(PDO::FETCH_ASSOC);
        else
            header("Location: ../views/index.php");
    }

    public function getjournaliststatusandrole($status, $role){
        $result = static::$conn->query("select * from enews.user where status_user = '{$status}' and  role_user = '{$role}'");
        if($result)
            return $result->fetchAll(PDO::FETCH_ASSOC);
        else
            header("Location: ../views/index.php");
    }

    /* public function editstudentbyid($obj)
    {
        $stud = new ConnectingDatabase();
        $dbcon = $stud->conenect();
        $dbcon->query("update iti.student set name='{$obj->name}',arabic='{$obj->arabic}', english='{$obj->english}' where id='{$obj->id}'");
    }
    public function deletestudent($id)
    {
        $stud = new ConnectingDatabase();
        $dbcon = $stud->conenect();
        $dbcon->query("delete from iti.student where id={$id}");
    } */
}
User::$conn = \Core\DatabaseConnection::getInstance()->connect();


?>