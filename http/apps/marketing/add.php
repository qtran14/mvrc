<?php

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];

$htmlCustomJS   = [
	'/js/marketing/add.form',
];

$htmlPageTitle = 'Add';
$data['expense_menu'] = 'active';
$data['expense_marketing_menu'] = 'active';

$data['expense_category_list'] = (new Expenses_Categories)->getList(2);

renderView('marketing/add');