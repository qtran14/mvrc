<?php

$htmlPageTitle = 'Add';
$data['active_expenses'] = 'active';

$expenseCategory = new Expenses_Categories;
$data['expense_category_list'] = $expenseCategory->getList();

renderView('expenses/add');