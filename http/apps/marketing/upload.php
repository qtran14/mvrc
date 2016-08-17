<?php
$htmlPageTitle = 'Expense Upload';
$data['expense_menu'] = 'active';
$data['expense_marketing_menu'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
];

$data['expense_category_list'] = (new Expenses_Categories)->getList(2);

renderView('marketing/upload');
?>
