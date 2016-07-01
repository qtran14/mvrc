<?php
// dd($httpRequest);
$post = $httpRequest->post;
$loginInfo = Session::get('user');


function validateAdd($post) {
	$validator = new GUMP;

	$rules = [
		'customer_first_name' => 'required',
	];

	$filters = [
		'customer_first_name' => 'trim',
	];

	$post = $validator->filter($post, $filters);

	$validated = $validator->validate($post, $rules);

	if ( $validated === TRUE ) return $validated;


	Session::set('post_data', $post);
	Session::setFlash('error', '* is required field');
	redirect('/customers/add');
}

if ( isset($post['add']) && $post['add'] == '1' ) {
	validateAdd($post);

	(new Customers)->save([
		'account_hash' => $loginInfo['account_hash'],
		'first_name' => encodeQuote($post['customer_first_name']),
		'last_name' => encodeQuote($post['customer_last_name']),
		'email' => encodeQuote($post['customer_email']),
		'phone' => encodeQuote($post['customer_phone']),
		'last_call_date' => empty($post['customer_last_call']) ? NULL : dbDateTime($post['customer_last_call']),
		'created_by' => $loginInfo['id'],
	]);

	Session::setFlash('success', "Customer added.");
	redirect('/customers');
}

// function validateEdit($post, $loginInfo) {
// 	if ( ! (new Expenses)->exist($post['id'], $loginInfo['account_hash']) || $post['expense_status'] == 3 ) {
// 		Session::setFlash('error', 'Invalid request.');
// 		redirect('/expenses');
// 	}

// 	$validator = new GUMP;

// 	$rules = [
// 		'expense_date' => 'required|date',
// 		'expense_category' => 'required|integer',
// 		'expense_name' => 'required',
// 		'expense_total' => 'required|numeric',
// 		'expense_status' => 'required|integer',
// 	];

// 	$filters = [
// 		'expense_date' => 'trim',
// 		'expense_category' => 'trim',
// 		'expense_name' => 'trim',
// 		'expense_total' => 'trim',
// 		'expense_status' => 'trim',
// 		'expense_notes' => 'trim',
// 	];

// 	$postDate = $post['expense_date'];
// 	$post['expense_date'] = dbDate($postDate);
// 	$post = $validator->filter($post, $filters);

// 	$validated = $validator->validate($post, $rules);

// 	if ( $validated === TRUE ) return $validated;


// 	$post['expense_date'] = ! empty($postDate) ? displayDate($postDate) : '';
// 	Session::setFlash('error', '* is required field');
// 	redirect('/expenses/edit?id=' . $post['id']);
// }

// if ( isset($post['update']) && $post['update'] == '1' && ! empty($post['id']) ) {
// 	validateEdit($post, $loginInfo);

// 	(new Expenses)->update([
// 		'on_date' => dbDate($post['expense_date']),
// 		'name' => encodeQuote($post['expense_name']),
// 		'category_id' => $post['expense_category'],
// 		'status_id' => $post['expense_status'],
// 		'amount' => $post['expense_total'],
// 		'description' => encodeQuote($post['expense_notes']),
// 		'last_updated_by' => $loginInfo['id'],
// 	], $post['id'], $loginInfo['account_hash']);

// 	Session::setFlash('success', "Expense updated.");
// 	redirect('/expenses');
// }

require_once abort();