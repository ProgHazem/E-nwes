<?php
namespace App\Models;
require ROOT_DIR . "/Core/Model.php";
 
class BlockedUser extends \Core\Model
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