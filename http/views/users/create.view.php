<div class="panel rounded shadow">
    <div class="panel-heading">
        <div class="pull-left">
            <h3 class="panel-title">Create User</h3>
        </div>
        <div class="pull-right">
            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
        </div>
        <div class="clearfix"></div>
    </div><!-- /.panel-heading -->
    <div class="panel-body no-padding">

        <form method="POST" action="" class="form-horizontal mt-10">
            <div class="form-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-7">
                        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="">
                    </div>
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-7">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="">
                    </div>
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-7">
                        <input type="password" name="confirm_password" class="form-control" id="inputConfirmPassword" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-7">
                        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="">
                    </div>
                </div>

                <?php if ( isBosAdmin() ) { ?>
                    <div class="form-group">
                        <label for="inputAccountName" class="col-sm-3 control-label">Account Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="account_name" class="form-control" id="inputAccountName" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAccountDescription" class="col-sm-3 control-label">Account Description</label>
                        <div class="col-sm-7">
                            <textarea name="account_description" id="inputAccountDescription" class="form-control" rows="5" placeholder=""></textarea>
                        </div>
                    </div>
                <?php } ?>
            </div><!-- /.form-body -->
            <div class="form-footer">
                <div class="col-sm-offset-3">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div><!-- /.form-footer -->
        </form>
    </div>
</div>
