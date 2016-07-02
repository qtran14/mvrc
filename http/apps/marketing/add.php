<?php

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];

$htmlCustomJS   = [
	'/js/marketing/add.form',
];

$htmlPageTitle = 'Add';
$data['active_expenses'] = 'active';
$data['active_expense_marketing'] = 'active';

$data['expense_category_list'] = (new Expenses_Categories)->getList(2);

renderView('marketing/add');