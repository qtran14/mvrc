<?php

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/dropzone/downloads/css/dropzone',
	'/assets/admin/css/pages/gallery',
];
$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/dropzone/downloads/dropzone.min',
	'/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];

$htmlCustomJS   = [
	'/js/expenses/edit_expenses'
];

$hash = $httpRequest->get['id'];
$info = (new Expenses)->info($hash, Session::get('user')['account_hash']);

if ( in_array($info['status_id'], [3, 4]) ) {
	Session::setFlash('error', 'Invalid request.');
	redirect('/expenses');
}

$data = [
	'id' => $hash,
	'expense_category_list' => (new Expenses_Categories)->getList(),
	'info' => $info,
	'expense_status_list' => (new Expenses_Status)->getListForEdit(),
];

$htmlPageTitle = 'Edit Expense';
$data['expense_menu'] = 'active';
$data['expense_main_menu'] = 'active';


renderView('expenses/edit');
?>
