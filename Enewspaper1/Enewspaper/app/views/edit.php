<style>
    #edit{
        padding:30px;
    }
</style>
<div class="reg_form tab-pane " id="edit">
        <h3 class="lead text-center">Edit information</h3>
        <form role="form" class="form-horizontal">
            <br><br>
        <div class="form-group">

            <label for="name" class="col-sm-2 control-label-left">
                First Name</label>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="FristName" required/>
                    </div>
                </div>
            </div>
            <label for="name" class="col-sm-2 control-label-left">
                    Last Name</label>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="LastName" required/>
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group">
                <label for="Username" class="col-sm-2 control-label-left">
                    Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Username" placeholder="Username" required/>
                </div>
        </div>
        <div class="form-group">
                <label for="BD" class="col-sm-2 control-label-left">
                    Birthday</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="BD" placeholder="Username" required/>
                </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label-left">
                Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label-left">
                Mobile</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="mobile" placeholder="Mobile"required />
            </div>
        </div>
        <div class="form-group">
                <label for="gender" class="col-sm-2 control-label-left">
                    Gender</label>
                <div class="col-sm-10">
                    Female <input type="radio" id="genderF" name="gender" required />
                    Male <input type="radio"  id="genderM" name="gender" required />
                </div>
        </div>
        <div class="form-group">
                <label for="gender" class="col-sm-2 control-label-left">
                    Role</label>
                <div class="col-sm-10">
                    User <input type="radio" id="genderF" name="gender" required />
                    Journalist <input type="radio"  id="genderM" name="gender" required />
                </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label-left">
                Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" required/>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="reg_button col-sm-10">
                <button type="submit" class="btn1 btn btn-success btn-sm">Edit</button>
            </div>
        </div>
        <br><br>
    </form>
</div>