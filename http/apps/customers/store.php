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

	$customer = new Customers;
	if ( $customer->existBy(encodeQuote($post['customer_first_name']), encodeQuote($post['customer_last_name']), $loginInfo['account_hash']) ) {
		Session::setFlash('error', "Customer has already existed.");
		redirect('/customers');
	}

	$customer->save([
		'account_hash' => $loginInfo['account_hash'],
		'first_name' => encodeQuote($post['customer_first_name']),
		'last_name' => encodeQuote($post['customer_last_name']),
		'email' => encodeQuote($post['customer_email']),
		'phone' => encodeQuote($post['customer_phone']),
		'last_call_date' => empty($post['customer_last_call']) ? NULL : dbDateTime($post['customer_last_call']),
		'status' => 1,
		'created_by' => $loginInfo['id'],
	]);

	Session::setFlash('success', "Customer added.");
	redirect('/customers');
}

function validateEdit($post, $loginInfo) {
	if ( ! (new Customers)->exist($post['id'], $loginInfo['account_hash']) ) {
		Session::setFlash('error', 'Invalid request.');
		redirect('/customers');
	}

	$validator = new GUMP;

	$rules = [
		'first_name' => 'required',
	];

	$filters = [
		'first_name' => 'trim',
	];

	$post = $validator->filter($post, $filters);

	$validated = $validator->validate($post, $rules);

	if ( $validated === TRUE ) return $validated;


	Session::set('post_data', $post);
	Session::setFlash('error', '* is required field');
	redirect('/customers/edit?id=' . $post['id']);
}

if ( isset($post['update']) && $post['update'] == '1' && ! empty($post['id']) ) {
	validateEdit($post, $loginInfo);

	(new Customers)->udpate([
		'first_name' => encodeQuote($post['first_name']),
		'last_name' => encodeQuote($post['last_name']),
		'email' => encodeQuote($post['email']),
		'phone' => encodeQuote($post['phone']),
		'status' => $post['status'],
		'last_updated_by' => $loginInfo['id'],
	], $post['id'], $loginInfo['account_hash']);

	Session::setFlash('success', "Customer updated.");
	redirect('/customers');
}

require_once abort();