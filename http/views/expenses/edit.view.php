<?php
// dd($data);
?>
<style type="text/css">
  #gallery {
      margin-top: 10px;
      min-height: 50px;
  }
</style>

<div class="header-content">
    <h2><i class="fa fa-dollar"></i>Expenses | Edit</h2>
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
                  <form method="POST" action="/expenses/store" id="iEditExpensesForm" class="form-horizontal mt-10">
                   	<div class="form-body">
                   	    <div class="form-group">
                            <label for="inputExpenseDate" class="col-sm-3 control-label"><strong>Date</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="expense_date" value="<?= displayDate($data['info']['on_date']) ?>" class="form-control datepicker-field" id="inputExpenseDate" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="selectExpenseCategory" class="col-sm-3 control-label"><strong>Category</strong> <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                            <select name="expense_category" id="selectExpenseCategory" class="chosen-select">
                              <?php 
                                foreach ( $data['expense_category_list'] as $key => $name ) {
                                  $selected = '';
                                  if ( $key == $data['info']['category_id']) $selected = " selected ";
                              ?>
                                <option value="<?= $key; ?>"<?= $selected; ?>><?= $name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="inputExpenseName" class="col-sm-3 control-label"><strong>Name</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="expense_name" value="<?= $data['info']['name']; ?>" class="form-control" id="inputExpenseName" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputExpenseTotal" class="col-sm-3 control-label"><strong>Total</strong> <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="expense_total" value="<?= $data['info']['amount']; ?>" class="form-control" id="inputExpenseTotal" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="selectStatus" class="col-sm-3 control-label"><strong>Status</strong> <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                            <select name="expense_status" id="selectStatus" class="chosen-select">
                              <?php 
                                foreach ( $data['expense_status_list'] as $key => $name ) {
                                  $selected = '';
                                  if ( $key == $data['info']['status_id']) $selected = " selected ";
                              ?>
                                <option value="<?= $key; ?>"<?= $selected; ?>><?= $name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="textExpenseNotes" class="col-sm-3 control-label"><strong>Notes</strong></label>
                            <div class="col-sm-7">
                                <textarea name="expense_notes" id="textExpenseNotes" class="form-control" rows="3" placeholder=""><?= $data['info']['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input" class="col-sm-3 control-label"><strong>Pictures</strong></label>
                            <div class="col-sm-7" id="pictureDivId">
                              <ul id="gallery">
                              </ul>
                            </div>
                        </div>

                   	</div>
                   	<div class="form-footer">
                   		<div class="col-sm-offset-3">
                        <input type="hidden" id="expenseHiddenId" name="id" value="<?= $data['id']; ?>">

                        <a class="btn btn-danger" href="/expenses">Back to Expense History</a>
                   			<button type="submit" name="update" value="1" id="addBtnId" class="btn btn-theme">Submit</button>
                   		</div>
                   	</div>
                   </form> 

                   <form method="POST" action="/expenses/handle_image_upload?id=<?= $data['id']; ?>" id="expensePictureForm" class="form-horizontal mt-10 dropzone mb-20 rounded dz-clickabler">
                     
                   </form>
                </div>
            </div>

        </div>
    </div>

</div>
