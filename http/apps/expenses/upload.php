<?php
$htmlPageTitle = 'Expense Upload';
$data['expense_menu'] = 'active';
$data['expense_main_menu'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
];


renderView('expenses/upload');
?>
