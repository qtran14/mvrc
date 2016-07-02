<?php
$htmlPluginCSS  = [
	'/assets/global/plugins/bower_components/dropzone/downloads/css/dropzone',
	'/assets/admin/css/pages/gallery',
];
$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/dropzone/downloads/dropzone.min',
	'/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];

$htmlCustomJS   = [
	// '/js/customers/edit_expenses'
];

$customer_id = $httpRequest->get['id'];
$data = [
	'customer_id' => $customer_id,
	'info' => (new Customers)->info($customer_id, Session::get('user')['account_hash']),
	'status_list' => (new Customers_Status)->getList(),
];

$htmlPageTitle = 'Edit Customer';
$data['customer_menu'] = 'active';
$data['customer_main_menu'] = 'active';


renderView('customers/edit');
?>
