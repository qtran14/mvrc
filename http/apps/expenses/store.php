<?php
// dd($httpRequest);
$post = $httpRequest->post;
$loginInfo = Session::get('user');

if ( isset($post['add']) && $post['add'] == '1' ) {
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

	(new Expenses)->save($inputData);

	Session::setFlash('success', "Expense added.");
	redirect('/expenses');
}

if ( isset($post['update']) && $post['update'] == '1' && ! empty($post['id']) ) {
	$inputData = [
		'on_date' => dbDate($post['expense_date']),
		'name' => encodeQuote($post['expense_name']),
		'category_id' => $post['expense_category'],
		'status_id' => $post['expense_status'],
		'amount' => $post['expense_total'],
		'description' => encodeQuote($post['expense_notes']),
		'last_updated_by' => $loginInfo['id'],
	];


	(new Expenses)->update($inputData, $post['id'], $loginInfo['account_hash']);

	Session::setFlash('success', "Expense updated.");
	redirect('/expenses');
	// redirect('/expenses/edit?id=' . $post['id']);
}