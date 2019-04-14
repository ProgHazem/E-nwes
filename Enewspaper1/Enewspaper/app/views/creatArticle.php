<style>
    #creatArticle{
        padding: 30px;
    }
    input[type="text"]{
        width:100%;
    }
    .creat{
         width:100%;
    }
</style>
<div class="reg_form tab-pane " id="creatArticle">
        <h3 class="lead text-center">Create Article</h3>
        <form role="form" class="form-horizontal">
            <br><br>
        <div class="form-group">

            <label for="name" class="col-sm-2 control-label-left">
                Title</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Title" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
                <label for="Body" class="col-sm-2 control-label-left">
                    Body</label>
                <div class="col-sm-10">
                    <textarea style="height:200px;" type="text" class="form-control" id="body" placeholder="Body" required></textarea>
                </div>
        </div>
        <div class="form-group">
                <label for="start-date" class="col-sm-2 control-label-left">Start Date</label>
                    <div class='col-sm-10'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                </div>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Famous Saying" value="" id="F_S" width="100%">
        </div>
        <div class="form-group" style="padding:20px 100px 20px 100px; margin:10px;">
            <form action="/action_page.php" >
                <input type="file" name="pic" accept="image/*" style="margin:10px;">
                <input class="btn btn-success creat" type="submit">
            </form>
        </div>
        <div class="row">
            <div class="reg_button col-sm-12">
                <button type="submit" class="btn btn-success btn-sm creat">Create</button>
            </div>
        </div>
        <br><br>
    </form>
</div>
