<?php
$htmlPageTitle = 'Edit Expense';
$data['active_expenses'] = 'active';
$data['active_expense_main'] = 'active';

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
$data = [
	'id' => $hash,
	'expense_category_list' => (new Expenses_Categories)->getList(),
	'info' => (new Expenses)->info($hash, Session::get('user')['account_hash']),
	'expense_status_list' => (new Expenses_Status)->getListForEdit(),
];

renderView('expenses/edit');
?>
