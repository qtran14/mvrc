<?php

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
	'/js/customers/index',
];

$htmlPageTitle = 'Customers';
$data['active_customers'] = 'active';
$data['active_customers_main'] = 'active';


renderView('customers/index');