<?php

if ( isSystemUser() ) {
	if ( $httpRequest->is('post') ) {
		$post = $httpRequest->post;
		// dd($post);
		$errors = [];

		$username = encodeQuote($httpRequest->post['username']);
		$password = encodeQuote($httpRequest->post['password']);
		$confirmPassword = encodeQuote($httpRequest->post['confirm_password']);
		$email = encodeQuote($httpRequest->post['email']);

		if ($post['password'] != $post['confirm_password']) $errors[] = 'Password mismatch';
		if ( empty($post['password']) ) $errors[] = 'Password is required';

		$user = new Users;
		if ( $user->exist($username) ) $errors[] = 'Please choose different username';
		if ( $user->emailExist($email) ) $errors[] = 'Please choose different email address';

		if ( empty($errors) ) {
			$salt = generateUUID(rand(5, 10));
			$pepper = generateUUID(rand(5, 10));
			$longPass = $salt.$password.$pepper;

			$user->save($username, $password, $email);
			Session::setFlash('success', 'User created.');
			redirect('users/create');
		}
	}
}

if ( isBosAdmin() ) {
	if ( $httpRequest->is('post') ) {
		$post = $httpRequest->post;
		// dd($post);
		$errors = [];

		$username = encodeQuote($httpRequest->post['username']);
		$password = encodeQuote($httpRequest->post['password']);
		$confirmPassword = encodeQuote($httpRequest->post['confirm_password']);
		$email = encodeQuote($httpRequest->post['email']);
		$accountName = encodeQuote($httpRequest->post['account_name']);
		$accountDescription = encodeQuote($httpRequest->post['account_description']);

		if ($post['password'] != $post['confirm_password']) $errors[] = 'Password mismatch';
		if ( empty($post['password']) ) $errors[] = 'Password is required';

		$user = new Users;
		if ( $user->exist($username) ) $errors[] = 'Please choose different username';
		if ( $user->emailExist($email) ) $errors[] = 'Please choose different email address';

		if ( empty($errors) ) {
			$salt = generateUUID(rand(5, 10));
			$pepper = generateUUID(rand(5, 10));
			$longPass = $salt.$password.$pepper;

			$user->save($username, $password, $email);
			Session::setFlash('success', 'User created.');
			redirect('users/create');
		}
	}
}

$htmlPageTitle = 'Create User';

renderView('users/create');
?>