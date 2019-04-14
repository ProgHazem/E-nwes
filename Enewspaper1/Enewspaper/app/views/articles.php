<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../templates/head.php') ?>
        <style>
            .article{
                background-color: #fff;
                padding: 20px;
                font-family: 'Courier New', Courier, monospace;
            }
            
            .title{
                font-size: 46px;
                font-weight: bold;
                font-family: "Open Sans", "Raleway", "Istok Web", Merriweather, "Helvetica Neue", Helvetica, sans-serif;
            }
            input[type=text].comment_text{
                width: 100%;
                height: 74px;
            }
            .comment_btn{
                width: 100%;
                font-size: 21px;
            }
            input[type=text].com{
                border: none;
                background-color: transparent;
                height: auto;
                width: auto;
            }
            .fa-user{
                font-size: 30px;
                border: 5px solid #ddd;
                padding: 9px 13px;
                border-radius: 50%;
                background-color: #377ab7;
                color: gainsboro;
            }
        </style>
    </head>
    <body>
        <!-- start navbar -->
        <?php include('../templates/header.php') ?>
        <!-- End navbar -->
        <div class="container article">
            <div class="row">
                <div class="col-xs-12 ">
                    <br>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Article</li>
                    </ol>
                    <h1 class="title">US astronauts heading back to space on American rockets in July: NASA</h1>
                    <hr>
                    <div class="time_post">Posted on February 8, 2019</div>
                    <div class="col-md-8 col-xs-12 left-slid">
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12 column article-featured-image wp-caption">
                            <img src="https://www.studentnewsdaily.com/wp-content/uploads/2019/02/SpaceX_Crew-Dragon-820x573.jpg" class="img-thumbnail" alt="US astronauts heading back to space on American rockets in July: NASA">
                            <div class="wp-caption-text">
                                <p>SpaceX’s “Crew Dragon” capsule will be used for both launches, the second of which will send two US astronauts to the International Space Station.</p>
                            </div>
                        </div>
                        <div class="article-content">
                            <div class="well" style="overflow:scroll">
                                <a name="questions"></a>
                                <h4>Questions</h4>
                                <p>1. The first paragraph of a news article should answer the questions who, what, where and when. List the who, what, where and when of this news item. (NOTE: The remainder of a news article provides details on the why and/or how.)</p>
                                <p>2. a) When will NASA launch its first test flight from the U.S.?<br>
                                b) When will the first manned flight take place?</p>
                                <p>3. Why haven’t U.S. astronauts traveled to space from the U.S. since 2011?</p>
                                <p>4. Which two U.S. companies have been chosen to build the space capsules NASA will be using?</p>
                                <p>5. What factors could change scheduled dates?</p>
                                <p>OPTIONAL: Ask a grandparent if he/she remembers John Glenn’s 1962 historic flight and successful orbit of the moon, and also Neil Armstrong and Buzz Aldrin’s walk on the moon: Please describe where you were / what you thought. Please describe how Americans reacted to these two historic flights.</p>
                                <br>
                                <h5 class="center">Free Answers — <a href="http://www.studentnewsdaily.com/signup-for-email/" target="_blank">Sign-up here</a> to receive a daily email with answers.</h5>
                            </div>
                            </div>
                            <div class="well">
                                <div class="form-group">
                                    <input type="text"  class="comment_text" placeholder="Your Comment ..."><br>
                                    <button class="comment_btn btn btn-success">Comment</button>
                                </div>
                                <div class="well">
                                    <h3>Comments</h3>
                                    <hr>
                                    <div class="form-group">
                                        <ul>
                                            <li>
                                                <i class="fa fa-user"></i><span> User1</span><br>
                                                <input class="com" type="text" value="hhhhfdjfjkjkhhh" disabled>
                                                
                                            </li>
                                            <hr>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4 col-xs-12 right-slid">
                            <div class="layer-white campaign-state show-for-medium mb20 js-campaign-state-large" data-identifier="trending"
                            style="opacity: 1;">
                            <div class="cs-text-contain">
                                <div class="fixed-width-column">
                                    
                                    <div class="list-group-item-info"><i class="precent fa fa-line-chart" aria-hidden="true"></i>This campaign is trending!</div>
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

