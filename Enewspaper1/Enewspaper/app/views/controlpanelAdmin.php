<?php
/**
 * Created by PhpStorm.
 * User: hazem
 * Date: 2/9/19
 * Time: 12:42 PM
 */
include "../controllers/UserController.php";
//include "../controllers/ArticleController.php";
//echo "<pre>";
//print_r($articalPending);
//print_r($articalApprove);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('../templates/head.php')?>
        <style>
            .admin{
                background-color: #fff;
                border-radius: 10px;
                height: 600px;
                margin-bottom: 50px;
                font-family:arile;
            }
            .tab-content{
                height: 400px;
                overflow: scroll;
            }
            .progress {
                height: 45px !important;
            }
            .progress h3 {
                color: #000000;
            }
        </style>

    </head>
    <body>
        <!-- start navbar -->
        <?php include('../templates/header.php')?>
        <!-- End navbar -->
        <div class="container admin">
            <h2>Admin Controls</h2>
            <hr>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#menu1">Users</a></li>
                <li><a data-toggle="tab" href="#menu2">Journalists</a></li>
                <li><a data-toggle="tab" href="#articals">Articles</a></li>
            </ul>
            <br />
            <br />
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <hr />
                    <br />
                    <h3>Number Of user Approve : <?php echo floor((count($userApprove)/count($userall))*100) ?>%</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo count($userApprove) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:<?php echo floor((count($userApprove)/count($userall))*100) ?>%">
                        </div>
                    </div>
                    <h3>Number Of user Pending : <?php echo floor((count($userPending)/count($userall))*100) ?>%</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo count($userPending) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:<?php echo floor((count($userPending)/count($userall))*100) ?>%">
                        </div>
                    </div>
                    <h3>Number Of user Blocked : <?php echo floor((count($userBlock)/count($userall))*100) ?>%</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo count($userBlock) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:<?php echo floor((count($userBlock)/count($userall))*100) ?>%">
                        </div>
                    </div>
                    <h3>Number Of Journalist Approve : <?php echo floor((count($journalistApprove)/count($userall))*100) ?>%</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo count($journalistApprove) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:<?php echo floor((count($journalistApprove)/count($userall))*100) ?>%">
                        </div>
                    </div>
                    <h3>Number Of Journalist Pending : <?php echo floor((count($journalistPending)/count($userall))*100) ?>%</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo count($journalistPending) ?>" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:<?php echo floor((count($journalistPending)/count($userall))*100) ?>%">
                        </div>
                    </div>
                    <h3>Number Of Articles Pending</h3>

                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                             aria-valuenow="70" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:70%">
                        </div>
                    </div>
                    <h3>Number Of Articles Approved</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                             aria-valuenow="70" aria-valuemin="0" aria-valuemax="<?php echo count($userall) ?>" style="width:70%">
                        </div>
                    </div>

                </div>
                <div id="menu1" class="tab-pane fade">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu1_1">User Approve</a></li>
                        <li><a data-toggle="tab" href="#menu1_2">User Pending</a></li>
                        <li><a data-toggle="tab" href="#menu1_3">User Block</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu1_1" class="tab-pane fade in active">
                            <h3>Users Approve</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>User Password</th>
                                            <th>User Phone</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>role_user</th>
                                            <th>status_user</th>
                                            <th colspan="2">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($userApprove as $userAPPro)
                                            {
//                                                print_r($userApprove);
                                                echo "
                                                    <tr>
                                                        <td>{$userAPPro['id']}</td>
                                                        <td>{$userAPPro['f_name']}</td>
                                                        <td>{$userAPPro['l_name']}</td>
                                                        <td>{$userAPPro['username']}</td>
                                                        <td>{$userAPPro['email']}</td>
                                                        <td>{$userAPPro['userpass']}</td>
                                                        <td>{$userAPPro['userphone']}</td>
                                                        <td>{$userAPPro['gender']}</td>
                                                        <td>{$userAPPro['birth']}</td>
                                                        <td>{$userAPPro['role_user']}</td>
                                                        <td>{$userAPPro['status_user']}</td>
                                                        <td ><a class='btn btn-primary' href=\"../controllers/UserController.php?idapproveblock={$userAPPro['id']}\">Block</a></td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?iddel={$userAPPro['id']}\">Delete</a></td>
                                                    </tr>
                                                ";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu1_2" class="tab-pane fade">
                            <h3>Users Pending</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>User Password</th>
                                        <th>User Phone</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>role_user</th>
                                        <th>status_user</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($userPending as $userpend)
                                    {
//                                                print_r($userApprove);
                                        echo "
                                                    <tr>
                                                        <td>{$userpend['id']}</td>
                                                        <td>{$userpend['f_name']}</td>
                                                        <td>{$userpend['l_name']}</td>
                                                        <td>{$userpend['username']}</td>
                                                        <td>{$userpend['email']}</td>
                                                        <td>{$userpend['userpass']}</td>
                                                        <td>{$userpend['userphone']}</td>
                                                        <td>{$userpend['gender']}</td>
                                                        <td>{$userpend['birth']}</td>
                                                        <td>{$userpend['role_user']}</td>
                                                        <td>{$userpend['status_user']}</td>
                                                        <td><a class='btn btn-success' href=\"../controllers/UserController.php?idapprove={$userpend['id']}\">Approve</a></td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?iddel={$userpend['id']}\">Delete</a></td>
                                                    </tr>
                                                ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu1_3" class="tab-pane fade">
                            <h3>Users Block</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>User Password</th>
                                        <th>User Phone</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>role_user</th>
                                        <th>status_user</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($userBlock as $userblock)
                                    {
//                                                print_r($userApprove);
                                        echo "
                                                    <tr>
                                                        <td>{$userblock['id']}</td>
                                                        <td>{$userblock['f_name']}</td>
                                                        <td>{$userblock['l_name']}</td>
                                                        <td>{$userblock['username']}</td>
                                                        <td>{$userblock['email']}</td>
                                                        <td>{$userblock['userpass']}</td>
                                                        <td>{$userblock['userphone']}</td>
                                                        <td>{$userblock['gender']}</td>
                                                        <td>{$userblock['birth']}</td>
                                                        <td>{$userblock['role_user']}</td>
                                                        <td>{$userblock['status_user']}</td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?iddel={$userblock['id']}\">Delete</a></td>
                                                    </tr>
                                                ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <br />
                            <hr />
                            <br />
                            <h3>Users Blockd</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Date Block until</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($blocked as $block)
                                    {
//                                        print_r($blocked);
                                        echo "
                                                    <tr>
                                                        <td>{$block['user_id']}</td>
                                                        <td>{$block['date_block']}</td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?iddelfromblocktable={$block['user_id']}\">Unblock</a></td>
                                                    </tr>
                                                ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu2_1">Journalists Approve</a></li>
                        <li><a data-toggle="tab" href="#menu2_2">Journalists Pending</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu2_1" class="tab-pane fade in active">
                            <h3>Journalists Approve</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>User Password</th>
                                        <th>User Phone</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>role_user</th>
                                        <th>status_user</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($journalistApprove as $journalistAPPro)
                                    {
//                                                print_r($journalistApprove);
                                        echo "
                                                    <tr>
                                                        <td>{$journalistAPPro['id']}</td>
                                                        <td>{$journalistAPPro['f_name']}</td>
                                                        <td>{$journalistAPPro['l_name']}</td>
                                                        <td>{$journalistAPPro['username']}</td>
                                                        <td>{$journalistAPPro['email']}</td>
                                                        <td>{$journalistAPPro['userpass']}</td>
                                                        <td>{$journalistAPPro['userphone']}</td>
                                                        <td>{$journalistAPPro['gender']}</td>
                                                        <td>{$journalistAPPro['birth']}</td>
                                                        <td>{$journalistAPPro['role_user']}</td>
                                                        <td>{$journalistAPPro['status_user']}</td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?iddel={$journalistAPPro['id']}\">Delete</a></td>
                                                    </tr>
                                                ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu2_2" class="tab-pane fade">
                            <h3>Journalists Pending</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>User Password</th>
                                        <th>User Phone</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>role_user</th>
                                        <th>status_user</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($journalistPending as $journalistPend)
                                    {
//                                                print_r($journalistPending);
                                        echo "
                                                    <tr>
                                                        <td>{$journalistPend['id']}</td>
                                                        <td>{$journalistPend['f_name']}</td>
                                                        <td>{$journalistPend['l_name']}</td>
                                                        <td>{$journalistPend['username']}</td>
                                                        <td>{$journalistPend['email']}</td>
                                                        <td>{$journalistPend['userpass']}</td>
                                                        <td>{$journalistPend['userphone']}</td>
                                                        <td>{$journalistPend['gender']}</td>
                                                        <td>{$journalistPend['birth']}</td>
                                                        <td>{$journalistPend['role_user']}</td>
                                                        <td>{$journalistPend['status_user']}</td>
                                                        <td><a class='btn btn-success' href=\"../controllers/UserController.php?idapprove={$journalistPend['id']}\">Approve</a></td>
                                                        <td><a class='btn btn-danger' href=\"../controllers/UserController.php?idapprovejournalistdel={$journalistPend['id']}\">Delete</a></td>
                                                    </tr>
                                                ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="articals" class="tab-pane fade">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu3_1">Articals Approve</a></li>
                        <li><a data-toggle="tab" href="#menu3_2">Articals Pending</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu2_1" class="tab-pane fade in active">
                            <h3>Articals Approve</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Date Artical</th>
                                        <th>Status Artical</th>
                                        <th>User ID</th>
                                        <th>Category Id</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($articalApprove as $art_approve)
                                        {
//                                                    print_r($articalApprove);
                                            echo "
                                                        <tr>
                                                            <td>{$art_approve['id']}</td>
                                                            <td><img width='200px' height='200px' alt='{$art_approve['image']}' src=\"{$art_approve['image']}\" /></td>
                                                            <td>{$art_approve['title']}</td>
                                                            <td>{$art_approve['body']}</td>
                                                            <td>{$art_approve['date_artical']}</td>
                                                            <td>{$art_approve['status_art']}</td>
                                                            <td>{$art_approve['user_id']}</td>
                                                            <td>{$art_approve['cat_id']}</td>
                                                            <td><a class='btn btn-danger' href=\"../controllers/ArticleController.php?idapprovearticledel={$art_approve['id']}\">Delete</a></td>
                                                        </tr>
                                                    ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu3_2" class="tab-pane fade">
                            <h3>Articals Pending</h3>
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Date Artical</th>
                                        <th>Status Artical</th>
                                        <th>User ID</th>
                                        <th>Category Id</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($articalPending as $art_pend)
                                    {
//                                                                                        print_r($articalPending);
                                        echo "
                                                        <tr>
                                                            <td>{$art_pend['id']}</td>
                                                            <td><img width='200px' height='200px' alt='{$art_pend['image']}' src=\"{$art_pend['image']}\" /></td>
                                                            <td>{$art_pend['title']}</td>
                                                            <td>{$art_pend['body']}</td>
                                                            <td>{$art_pend['date_artical']}</td>
                                                            <td>{$art_pend['status_art']}</td>
                                                            <td>{$art_pend['user_id']}</td>
                                                            <td>{$art_pend['cat_id']}</td>
                                                            <td><a class='btn btn-success' href=\"../controllers/ArticleController.php?idpendarticleapprove={$art_pend['id']}\">Approve</a></td>
                                                            <td><a class='btn btn-danger' href=\"../controllers/ArticleController.php?idpendarticledel={$art_pend['id']}\">Delete</a></td>
                                                        </tr>
                                                    ";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start footer -->
        <?php include('../templates/footer.php')?>
        <!-- End footer -->

        <!-- Start script load -->
        <?php include('../templates/script.php')?>
        <!-- End script load -->
    </body>
</html>
