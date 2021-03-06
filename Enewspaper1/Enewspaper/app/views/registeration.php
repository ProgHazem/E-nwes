<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../templates/head.php') ?>
        <style>
            .FR{
                padding: 20px 100px;
                background-color: #fff;
                border-radius: 20px;
            }
        </style>
     </head>
     <body>
         <!-- start navbar -->
         <?php include('../templates/header.php') ?>
         <!-- End navbar -->
        <div class="reg_form tab-pane " id="Registration">
        <h3 class="lead text-center">Registration Form</h3>
        <form class="FR"  action="register.php" method="POST" role="form" class="form-horizontal">
            <br><br>
        <div class="form-group">

            <label for="name" class="col-sm-2 control-label-left">
                First Name</label>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="FristName" class="form-control" placeholder="FristName" required/>
                    </div>
                </div>
            </div>
            <label for="name" class="col-sm-2 control-label-left">
                    Last Name</label>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="LastName" class="form-control" placeholder="LastName" required/>
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group">
                <label for="Username" class="col-sm-2 control-label-left">
                    Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="Username" id="Username" placeholder="Username" required/>
                </div>
        </div>
        <div class="form-group">
                <label for="BD" class="col-sm-2 control-label-left">
                    Birthday</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="BD" id="BD" placeholder="Username" required/>
                </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label-left">
                Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label-left">
                Mobile</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile"required />
            </div>
        </div>
        <div class="form-group">
                <label for="gender" class="col-sm-2 control-label-left">
                    Gender</label>
                <div class="col-sm-10">
                    Female <input type="radio" name="genderF" id="genderF" name="gender" required />
                    Male <input type="radio" name="genderM" id="genderM" name="gender" required />
                </div>
        </div>
        <div class="form-group">
                <label for="gender" class="col-sm-2 control-label-left">
                    Role</label>
                <div class="col-sm-10">
                    User <input type="radio" name="U" id="U" name="gender" required />
                    Journalist <input type="radio" name="J" id="J" name="gender" required />
                </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label-left">
                Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="reg_button col-sm-10">
                <button style="margin-top: 17px;width: 99%;" type="submit" name="register" class="btn1 btn btn-success btn-sm">Sign Up</button>
            </div>
        </div>
        <br><br>
    </form>
</div>
        <?php include('../templates/footer.php') ?>
        <!-- End footer -->
        
       <!-- Start script load -->
       <?php include('../templates/script.php') ?>
       <!-- End script load -->
    </body>
</html>
