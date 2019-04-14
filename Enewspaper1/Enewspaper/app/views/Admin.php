<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('head.php')?>
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
        </style>

    </head>
    <body>
        <!-- start navbar -->
        <?php include('header.php')?>
        <!-- End navbar -->
        <div class="container admin">
            <h2>Admin Controls</h2>
            <hr>          
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#user">Users</a></li>
                <li><a data-toggle="tab" href="#journalist">Journalist</a></li>
                <li><a data-toggle="tab" href="#articles">Articles</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <h3>HOME</h3>
                <p></p>
                </div>
                <div id="user" class="tab-pane fade">
                <h3>Users</h3>
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                                <td style="padding:0"><button class="btn btn-primary" >Edit</button> </td>
                                <td><button class="btn btn-danger">Delete</button> </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
                </div>
                <div id="journalist" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="articles" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
        </div>
        <!-- Start footer -->
        <?php include('footer.php')?>
        <!-- End footer -->

        <!-- Start script load -->
        <?php include('script.php')?>
        <!-- End script load -->
    </body>
</html>

