<?php
$htmlPageTitle = 'Expense Upload';
$data['active_expenses'] = 'active';
$data['active_expense_marketing'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
];


renderView('marketing/upload');
?>
