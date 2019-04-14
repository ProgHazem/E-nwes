<?php
/**
 * Created by PhpStorm.
 * User: hazem
 * Date: 2/9/19
 * Time: 12:42 PM
 */
include "../controllers/UserController.php";
session_start();

echo $_SESSION['username'];
session_destroy();
