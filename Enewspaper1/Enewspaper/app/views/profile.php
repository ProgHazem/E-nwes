<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../templates/head.php') ?>
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
            .Profile{
                background-color: #fff;
                padding: 20px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }
            h1{
                font-family: 'Yeseva One', cursive;
            }
            .x{
                min-height: 800px;
                        }
            .btn_control{
                float: right;
            }
            input[type="text"] {
                width: 130px;
            }
            </style>
     </head>
     <body>
         <!-- start navbar -->
         <?php include('../templates/header.php') ?>
         <!-- End navbar -->

         <?php
         include('../controllers/UserController.php');
         echo $profile_user['id'];?>
       
        <div class="container Profile">
            <div class="row">
                <div class="col-xs-12 ">
                    <br>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Profile</li>
                    </ol>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="well x">
                        <div class="row">
                            <div class="col-md-8">
                                    <div class="info" >
                                        <h1>Julia Louis-Dreyfus Acts Out</h1>
                                        <div class="well" style="height: 155px;">
                                            <ul>
                                                <li>from</li>
                                                <li>Date</li>
                                                <li>projects</li>
                                            </ul>
                                            <div class="btn_control">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-smm">Edit</button> 
                                                    <div class="modal fade bs-example-modal-smm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                        <div class="modal-dialog modal-sm y " role="document" >
                                                            <div class="modal-content">
                                                                <!-- Start login form -->
                                                                <?php include('edit.php')?>
                                                                <!-- End login form -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sml">Post New Article</button> 
                                                    <div class="modal fade bs-example-modal-sml" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                        <div class="modal-dialog modal-sm z" role="document" >
                                                            <div class="modal-content">
                                                                <!-- Start login form -->
                                                                <?php include('creatArticle.php')?>
                                                                <!-- End login form -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
        
                            <div class="col-md-4">
                                <img src="../images/desktop-small.jpg"  class="img-thumbnail" >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
            
                                <div class="projects">
                                        <hr>
                                        <h3 class="text-center">Projects</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail">
                                                    <img src="../images/table.jpg" class="img-thumbnail" alt="...">
                                                    <div class="caption">
                                                        <h3>project title</h3>
                                                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../templates/footer.php') ?>
        <!-- End footer -->
        
       <!-- Start script load -->
       <?php include('../templates/script.php') ?>
       <!-- End script load -->
    </body>
</html>

