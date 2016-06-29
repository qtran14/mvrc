<?php

$htmlPluginJS   = [
	'/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];

$htmlCustomJS   = [
	'/js/expenses/add.form',
];

$htmlPageTitle = 'Add';
$data['active_expenses'] = 'active';

$data['expense_category_list'] = (new Expenses_Categories)->getList();

renderView('expenses/add');