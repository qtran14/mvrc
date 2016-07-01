<?php
$htmlPageTitle = 'Customers Upload';
$data['active_customers'] = 'active';
$data['active_customers_main'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
];


renderView('customers/upload');
?>
