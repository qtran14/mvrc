<?php
$htmlPageTitle = 'Customers Upload';
$data['customer_menu'] = 'active';
$data['customer_main_menu'] = 'active';

$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/css/bootstrap-fileupload.min',
];

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/bootstrap-fileupload/js/bootstrap-fileupload.min',
];


renderView('customers/upload');
?>
