<?php
// dd($data);
// dd(Session::get('post_errors'));
?>

<div class="header-content">
    <h2><i class="fa fa-group"></i>Customers | Edit</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Form</h3>
                </div>
                <div class="panel-body">
                  <form method="POST" action="/customers/store" id="addExpensesForm" class="form-horizontal mt-10">
                   	<div class="form-body">
                   	    <div class="form-group">
                            <label for="inputCustomerFirstName" class="col-sm-3 control-label"><strong>First Name</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="first_name" value="<?= isset($data['info']['first_name']) ? $data['info']['first_name'] : ''; ?>" class="form-control" id="inputCustomerFirstName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerLastName" class="col-sm-3 control-label"><strong>Last Name</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="last_name" value="<?= isset($data['info']['last_name']) ? $data['info']['last_name'] : ''; ?>" class="form-control" id="inputCustomerLastName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerEmail" class="col-sm-3 control-label"><strong>Email</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="email" value="<?= isset($data['info']['email']) ? $data['info']['email'] : ''; ?>" class="form-control" id="inputCustomerEmail" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerPhone" class="col-sm-3 control-label"><strong>Phone</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="phone" value="<?= isset($data['info']['phone']) ? $data['info']['phone'] : ''; ?>" class="form-control" id="inputCustomerPhone" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="iCustomerStatus" class="col-sm-3 control-label"><strong>Status</strong> <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                            <select name="status" id="iCustomerStatus" class="chosen-select">
                              <?php 
                                foreach ( $data['status_list'] as $key => $name ) {
                                  $selected = '';
                                  if ( $key == $data['info']['status']) $selected = " selected ";
                              ?>
                                <option value="<?= $key; ?>"<?= $selected; ?>><?= $name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                   	</div>
                   	<div class="form-footer">
                        <input type="hidden" id="iCustomerId" name="id" value="<?= $data['info']['id']; ?>">

                   		<div class="col-sm-offset-3">
                   			<button type="submit" name="update" value="1" id="iUpdate" class="btn btn-success">Submit</button>
                   		</div>
                   	</div>
                   </form> 
                </div>
            </div>

        </div>
    </div>

</div>

<footer class="footer-content">
    
</footer>