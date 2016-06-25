<?php
$htmlPageTitle = 'Expense Upload';
$data['active_expenses'] = 'active';
$data['active_expense_main'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
	// '/assets/global/plugins/bower_components/datatables/css/datatables.responsive'
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
	// '/assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap',
	// '/assets/global/plugins/bower_components/datatables/js/datatables.responsive'
];

// $htmlCustomJS   = [
// 	'/js/expenses/history.list'
// ];

renderView('expenses/upload');
?>
