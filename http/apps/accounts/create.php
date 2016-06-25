<?php

if ( $httpRequest->is('post') ) {
	$post = $httpRequest->post;
	// dd($post);

	$loginInfo = Session::get('user');

	$accountHash = getUUID(12, $db, 'accounts', 'hash');
	$accountName = encodeQuote($post['account_name']);
	$accountDescription = encodeQuote(nl2br($post['account_description']));
	
	$account = new Accounts;
	$account->save($accountHash, $accountName, $accountDescription, $loginInfo['id']);
	
	$username = encodeQuote($post['username']);
	$password = encodeQuote($post['password']);
	$email = encodeQuote($post['email']);
	
	$user = new Users;
	$user->save($username, $password, $email, $loginInfo['id'], 2, 3, $accountHash);

	$directoryName = getPath('public') . '/accounts/' . $accountHash;
	if ( mkdir($directoryName, 777, true) )	Session::setFlash('success', "Account created.");
	else Session::setFlash('error', "Unable to create an account!");
	// redirect('accounts');
}

$htmlPageTitle = 'Create Account';

renderView('accounts/create');
?>