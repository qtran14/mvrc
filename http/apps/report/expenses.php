<?php
$htmlPageTitle = 'Report Expense Main';
$data['report_menu'] = 'active';
$data['report_expense_menu'] = 'active';
$data['report_expense_main_menu'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap',
	'/assets/global/plugins/bower_components/datatables/css/datatables.responsive',
	'/assets/global/plugins/bower_components/fuelux/dist/css/fuelux.min',
];
$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min',
	'/assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap',
	'/assets/global/plugins/bower_components/datatables/js/datatables.responsive',
	'/assets/global/plugins/bower_components/fuelux/dist/js/fuelux.min',
];

$htmlCustomJS   = [
	'/js/report/expense'
];

// $data['expneses_status'] = (new Expenses_Status)->getList();
$expense_type = 1;
$number_of_report = 24;

$account_info = Session::get('account_info');

$report = new Report;
$report_detail = new ReportDetail;

$all_reports = $report->belongsTo($account_info['id'], $expense_type, $number_of_report);
if ( ! empty($all_reports) ) {
	$categories = (new Expenses_Categories)->all($expense_type);
	foreach ( $all_reports as $index => $report ) $all_reports[$index]['summary'] = $report_detail->summary($report['id'], $categories);
}

$data['all_reports'] = $all_reports;
$data['expense_type'] = $expense_type;
$data['header_title'] = 'Expense Main';


renderView('report/expenses');
?>
