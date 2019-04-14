<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../templates/head.php') ?>
        <style>
            .part3 p{font-size:20px;}
            .projects{background-color:#fff;padding:20px;margin-bottom:50px;}
            .part-peaper{
                height: 350px;
                border: 1px solid;
                border:none;
            }
        </style>
    </head>
    <body>
        <!-- start navbar -->
        <?php include('../templates/header.php') ?>
        <!-- End navbar -->
        <section class="logo col-lg-12 col-xs-6">
            <p class="f-word">INTERNATIONAL</p>
            <p><span>E</span>-News<span>P</span>aper</p>
        </section>
        <section class="content">
            <section class="part-peaper col-lg-12">
                <div class="part1 col-lg-3 col-xs-12 ">
                    <img src="../images/table.jpg" style=" margin: 0 -15px;   width: 338px; height:300px">
                </div>
                <div class="part2 col-lg-3 col-xs-12">
                    <img src="../images/table.jpg"  style=" margin: 0 -15px;   width: 338px; height:300px">
                </div>
                <div class="part3 col-lg-3 col-xs-12 text-center">
                    <br><br><br><br>
                    <p class="f-word">INTERNATIONAL</p>
                    <p><span>E</span>-News<span>P</span>aper</p>
                </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="projects">
                                <hr>
                                <h3 class="text-center">Articles</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
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
            
          
        <!-- Start footer -->
        <?php include('../templates/footer.php') ?>
        <!-- End footer -->
        
       <!-- Start script load -->
       <?php include('../templates/script.php') ?>
       <!-- End script load -->

        
    </body>
</html>
