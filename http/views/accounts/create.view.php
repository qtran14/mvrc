<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Accounts</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Account</h3>
                </div>
                <div class="panel-body">
                   <form method="POST" action="" id="createAccountFormId" class="form-horizontal mt-10">
                    	<div class="form-body">
                    		<div class="form-group">
                    		    <label for="inputUsername" class="col-sm-3 control-label"><strong>Username:</strong> <span class="asterisk">*</span></label>
                    		    <div class="col-sm-7">
                    		        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="">
                    		    </div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    	    <label for="inputPassword" class="col-sm-3 control-label"><strong>Password: </strong> <span class="asterisk">*</span></label>
                    	    <div class="col-sm-7">
                    	        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="">
                    	    </div>
                    	</div>
                    	<div class="form-group">
                    	    <label for="inputEmail" class="col-sm-3 control-label"><strong>Email: </strong> <span class="asterisk">*</span></label>
                    	    <div class="col-sm-7">
                    	        <input type="email" name="email" value="" class="form-control" id="inputEmail" placeholder="">
                    	    </div>
                    	</div>
                    	<div class="form-group">
                    	    <label for="inputAccountName" class="col-sm-3 control-label"><strong>Account Name: </strong> <span class="asterisk">*</span></label>
                    	    <div class="col-sm-7">
                    	        <input type="text" name="account_name" value="" class="form-control" id="inputAccountName" placeholder="">
                    	    </div>
                    	</div>
                    	<div class="form-group">
                    	    <label for="textareaAccountDescription" class="col-sm-3 control-label"><strong>Account Description: </strong></label>
                    	    <div class="col-sm-7">
                    	        <textarea name="account_description" value="" id="textareaAccountDescription" class="form-control" rows="5" placeholder=""></textarea>
                    	    </div>
                    	</div>
                    	<div class="form-footer">
                    		<div class="col-sm-offset-3">
                    			<button type="submit" name="create_account" value="1" id="createAccountButtonId" class="btn btn-success">Create Account</button>
                    		</div>
                    	</div>
                    </form> 
                </div>
            </div>

        </div>
    </div>

</div>
