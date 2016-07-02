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
	'/js/marketing/edit_expenses'
];

$hash = $httpRequest->get['id'];
$info = (new Expenses)->info($hash, Session::get('user')['account_hash']);

if ( in_array($info['status_id'], [3, 4]) ) {
	Session::setFlash('error', 'Invalid request.');
	redirect('/marketing');
}

$data = [
	'id' => $hash,
	'expense_category_list' => (new Expenses_Categories)->getList(2),
	'info' => $info,
	'expense_status_list' => (new Expenses_Status)->getListForEdit(),
];

renderView('marketing/edit');
?>
