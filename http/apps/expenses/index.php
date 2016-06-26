<?php
$htmlPageTitle = 'Expense History';
$data['active_expenses'] = 'active';
$data['active_expense_main'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap',
	'/assets/global/plugins/bower_components/datatables/css/datatables.responsive',
	'/assets/global/plugins/bower_components/fuelux/dist/css/fuelux.min',
	'/assets/global/plugins/bower_components/chosen_v1.2.0/chosen',
];
$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min',
	'/assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap',
	'/assets/global/plugins/bower_components/datatables/js/datatables.responsive',
	'/assets/global/plugins/bower_components/fuelux/dist/js/fuelux.min',
	'/assets/global/plugins/bower_components/chosen_v1.2.0/chosen.jquery',
];

$htmlCustomJS   = [
	'/js/expenses/history.list'
];

$data['expneses_status'] = (new Expenses_Status)->getList();
renderView('expenses/index');
?>
