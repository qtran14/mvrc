<?php
// dd($data);
// dd(Session::get('post_errors'));
?>

<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Customers | Add</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Form</h3>
                </div>
                <div class="panel-body">
                  <form method="POST" action="/customers/store" id="addExpensesForm" class="form-horizontal mt-10">
                   	<div class="form-body">
                   	    <div class="form-group">
                            <label for="inputCustomerFirstName" class="col-sm-3 control-label"><strong>First Name</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="customer_first_name" value="<?= isset($data['customer_first_name']) ? $data['customer_first_name'] : ''; ?>" class="form-control" id="inputCustomerFirstName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerLastName" class="col-sm-3 control-label"><strong>Last Name</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="customer_last_name" value="<?= isset($data['customer_last_name']) ? $data['customer_last_name'] : ''; ?>" class="form-control" id="inputCustomerLastName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerEmail" class="col-sm-3 control-label"><strong>Email</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="customer_email" value="<?= isset($data['customer_email']) ? $data['customer_email'] : ''; ?>" class="form-control" id="inputCustomerEmail" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCustomerPhone" class="col-sm-3 control-label"><strong>Phone</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="customer_phone" value="<?= isset($data['customer_phone']) ? $data['customer_phone'] : ''; ?>" class="form-control" id="inputCustomerPhone" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputLastCallDate" class="col-sm-3 control-label"><strong>Last Call Date</strong> </label>
                            <div class="col-sm-7">
                                <input type="text" name="customer_last_call" value="<?= isset($data['customer_last_call']) ? $data['customer_last_call'] : ''; ?>" class="form-control datepicker-field" id="inputLastCallDate" placeholder="">
                            </div>
                        </div>

                   	</div>
                   	<div class="form-footer">
                   		<div class="col-sm-offset-3">
                   			<button type="submit" name="add" value="1" id="addBtnId" class="btn btn-success">Submit</button>
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