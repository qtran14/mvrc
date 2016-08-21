<?php
if ( ! $httpRequest->is('ajax') ) die("Invalid request.");

$report = encodeQuote($httpRequest->get['report']);
$expense_hash = encodeQuote($httpRequest->get['expense']);
$category_id = encodeQuote($httpRequest->get['category']);
$expense_type = encodeQuote($httpRequest->get['expense_type']);
$account_info = Session::get('account_info');

$expense_info = (new Expenses)->info($expense_hash, $account_info['hash']);
if ( empty($expense_info) ) die("Invalid request.");


$expense_category_list = (new Expenses_Categories)->getList($expense_type);

$form = '<form method="POST" action="#" id="iEditExpensesReportDetailForm" class="form-horizontal mt-10">';
$form .= '<div class="form-body">';
	$form .= '<div class="form-group">';
		$form .= '<label for="inputExpenseDate" class="col-sm-3 control-label"><strong>Date</strong> <span class="asterisk">*</span></label>';
	    $form .= '<div class="col-sm-7">';
            $form .= '<input type="text" name="expense_date" value="' . displayDate($expense_info['on_date']) . '" class="form-control datepicker-field-modal" id="inputExpenseDate" placeholder="">';
        $form .= '</div>';
	$form .= '</div>';

	$form .= '<div class="form-group">';
      $form .= '<label for="selectExpenseCategory" class="col-sm-3 control-label"><strong>Category</strong> <span class="asterisk">*</span></label>';
      $form .= '<div class="col-sm-7">';
        $form .= '<select name="expense_category" id="selectExpenseCategory" class="chosen-select">';
            foreach ( $expense_category_list as $key => $name ) {
              	$selected = '';
              	if ( $key == $expense_info['category_id']) $selected = " selected ";
            	$form .= '<option value="' . $key .'"'. $selected . '>' . $name . '</option>';
          	}
        $form .= '</select>';
      $form .= '</div>';
    $form .= '</div>';

    $form .= '<div class="form-group">';
        $form .= '<label for="inputExpenseName" class="col-sm-3 control-label"><strong>Name</strong> <span class="asterisk">*</span></label>';
        $form .= '<div class="col-sm-7">';
            $form .= '<input type="text" name="expense_name" value="' . $expense_info['name'] . '" class="form-control" id="inputExpenseName" placeholder="">';
        $form .= '</div>';
    $form .= '</div>';

    $form .= '<div class="form-group">';
        $form .= '<label for="inputExpenseTotal" class="col-sm-3 control-label"><strong>Total</strong> <span class="asterisk">*</span></label>';
        $form .= '<div class="col-sm-7">';
            $form .= '<input type="text" name="expense_total" value="' . $expense_info['amount'] . '" class="form-control" id="inputExpenseTotal" placeholder="">';
        $form .= '</div>';
    $form .= '</div>';

    $form .= '<div class="form-group">';
        $form .= '<label for="textExpenseNotes" class="col-sm-3 control-label"><strong>Notes</strong></label>';
        $form .= '<div class="col-sm-7">';
            $form .= '<textarea name="expense_notes" id="textExpenseNotes" class="form-control" rows="3" placeholder="">' . $expense_info['description'] . '</textarea>';
        $form .= '</div>';
    $form .= '</div>';
$form .= '</div>';

$form .= '<div class="form-footer">';
	$form .= '<div class="col-sm-offset-3">';
	$form .= '<input type="hidden" id="expenseHiddenId" name="id" value="' . $expense_hash . '">';
	$form .= '<input type="hidden" id="iReportHiddenModalForm" value="' . $report . '">';
	$form .= '<input type="hidden" id="iCategoryHiddenModalForm" value="' . $category_id . '">';

		$form .= '<button type="submit" name="update" value="1" id="updateBtnId" class="btn btn-theme">Submit</button>';
	$form .= '</div>';
$form .= '</div>';

$form .= '</form>';

die(json_encode([
		'error' => 0,
		'form' => $form,
	]));
?>
