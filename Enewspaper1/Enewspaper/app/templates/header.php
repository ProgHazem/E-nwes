<?php
session_start();
    if ($_SESSION)
    {
        echo $_SESSION['username'];
?>
<style>
  input[type=text] {
    width: 130px;
    height:34px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }
  
  /* input[type=text]:focus {
    width: 100%;
  } */

  .catagory{
    margin-top:-22px;
    font-family:arile;
  }
  .search{
    margin: -13px;
  }
  .btn-primary {

      background-color: transparent;
  }
  .btn-primary {
      color: #fff;
      background-color: transparent; 
      border-color: transparent;
  }
  .navbar-form .form-control{
      border: 0px;
      border-bottom-left-radius: 0px;
      border-top-left-radius: 0px;
      border-left: 1px solid #888;
  }
  .btn-primary,.btn-primary:hover{
    background-color: transparent;
    border-color: transparent;

        }
</style>
<?php
    }else{
        ?>

<nav class="navbar navbar-default  navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">E-N</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right sign ">
          <li>
            <!-- Large modal -->
            <a href="index.php"> <button type="button" class="btn btn-primary" data-toggle="modal"><i class="fa fa-home"></i>
                Home </button>|
            </a>
          </li>
          <li>
            <!-- Large modal -->
            <a href="profile.php?username=$_SESSION['username']"> <button type="button" class="btn btn-primary" data-toggle="modal"><i class="fa fa-user"></i>
                Profile</button>|
            </a>
          </li>
          <li>

            <a href="login.php"> <button type="button" class="b1 btn btn-primary"><i class="fa fa-sign-in"></i>
                login</button>|</a>
          </li>
         
          <li>
            <!-- Large modal -->
            <a href="register.php"> <button type="button" class="btn btn-primary" data-toggle="modal"><i class="fa fa-user-plus"></i>
                sign up</button>
            </a>
          </li>

        </ul>
            <!-- <form class="navbar-form navbar-right">
              <div class="form-group search">
                <input type="text" name="search" placeholder="Search.." style=" width: 130px;">
              
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form> -->
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <nav class="navbar navbar-default  catagory">
        <div class="container-fluid">
            <ul class="nav navbar-nav text-center">
                <li><a href="#">Sports |</a></li>
                <li><a href="#">Social</a></li>
            </ul>
        </div>
    </nav>
<?php
    }
?>