<?php

$htmlPageTitle = 'Add';
$data['active_expenses'] = 'active';

$data['expense_category_list'] = (new Expenses_Categories)->getList();

renderView('expenses/add');