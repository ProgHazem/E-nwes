<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../templates/head.php') ?>
        <style>
            .form-group {
                margin-bottom: 62px;
            }
        </style>
     </head>
     <body>
         <!-- start navbar -->
         <?php include('../templates/header.php') ?>
         <!-- End navbar -->
         <div class="log_form tab-pane active" id="login">
        <h3 class="lead text-center">Login Form</h3>
            <form action="../controllers/UserController.php" method="post" role="form" class=" form-horizontal">
                <br><br>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label-left">
                        Email</label>
                    <div class="col-sm-10 ">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"requiard/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="col-sm-2 control-label-left">
                        Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="PassWord"required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="log_button col-sm-10">
                        <button type="submit" name="login" class="btn1 btn btn-success btn-sm">
                            Submit</button>
                        <a href="javascript:;">Forgot your password ?!</a>
                    </div>
                </div>
                <br><br>
            </form>
    </div>
        <!-- Start footer -->
        <?php include('../templates/footer.php') ?>
        <!-- End footer -->
        
       <!-- Start script load -->
       <?php include('../templates/script.php') ?>
       <!-- End script load -->
    </body>
</html>
