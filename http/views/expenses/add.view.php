<?php
// dd($data);
// dd(Session::get('post_errors'));
?>

<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Expenses | Add</h2>
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
                  <form method="POST" action="/expenses/store" id="addExpensesForm" class="form-horizontal mt-10">
                   	<div class="form-body">
                   	    <div class="form-group">
                            <label for="inputExpenseDate" class="col-sm-3 control-label"><strong>Date</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="expense_date" value="<?= isset($data['expense_date']) ? $data['expense_date'] : ''; ?>" class="form-control datepicker-field" id="inputExpenseDate" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="selectExpenseCategory" class="col-sm-3 control-label"><strong>Category</strong> <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                            <select name="expense_category" id="selectExpenseCategory" class="chosen-select">
                              <option value="">Select</option>
                              <?php
                                $expensesCategory = isset($data['expense_category']) ? $data['expense_category'] : '';
                                foreach ( $data['expense_category_list'] as $key => $name ) { 
                                  $selected = '';
                                  if ( $expensesCategory == $key ) $selected = ' selected="selected"';
                              ?>
                                <option value="<?= $key; ?>"<?= $selected; ?>><?= $name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="inputExpenseName" class="col-sm-3 control-label"><strong>Name</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="expense_name" value="<?= isset($data['expense_name']) ? $data['expense_name'] : ''; ?>" class="form-control" id="inputExpenseName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputExpenseTotal" class="col-sm-3 control-label"><strong>Total</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                              <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" name="expense_total" value="<?= isset($data['expense_total']) ? $data['expense_total'] : ''; ?>" class="form-control" id="inputExpenseTotal" placeholder="">
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textExpenseNotes" class="col-sm-3 control-label"><strong>Notes</strong></label>
                            <div class="col-sm-7">
                                <textarea name="expense_notes" id="textExpenseNotes" class="form-control" rows="5" placeholder=""><?= isset($data['expense_notes']) ? $data['expense_notes'] : ''; ?></textarea>
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