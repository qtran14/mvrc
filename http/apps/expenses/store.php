<?php
// dd($httpRequest);
$post = $httpRequest->post;

if ( isset($post['add']) && $post['add'] == '1' ) {
	$loginInfo = Session::get('user');

	$inputData = [
		'hash' => getUUID(60, getDB(), 'expenses', 'hash'),
		'account_hash' => $loginInfo['account_hash'],
		'on_date' => dbDate($post['expense_date']),
		'name' => encodeQuote($post['expense_name']),
		'category_id' => $post['expense_category'],
		'status_id' => 1,
		'amount' => $post['expense_total'],
		'description' => encodeQuote($post['expense_notes']),
		'created_by' => $loginInfo['id'],
	];

	$expense = new Expenses;
	$expense->save($inputData);

	Session::setFlash('success', "Expense Added.");
	redirect('/expenses');
}