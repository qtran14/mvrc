<?php

if ( $httpRequest->is('post') ) {
	$post = $httpRequest->post;
	$username = encodeQuote($post['username']);

	$user = new Users();

	$userInfo = $user->info($username);

	if ( password_verify($userInfo['salt'].$post['password'].$userInfo['pepper'], $userInfo['pw_hash']) ) {
		Session::set('userLogin', 1);	
		Session::set('user', $userInfo);
		Session::set('account_info', (new Accounts)->info($userInfo['account_hash']));

		$httpRequest->referer(Session::get('referer'));	
	}

	Session::setFlash('error', 'Invalid username/password');
}


$htmlPageTitle = 'Sign In';

$htmlPluginCSS = [
    '/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min',
    '/assets/global/plugins/bower_components/animate.css/animate.min',
    '/assets/admin/css/pages/sign',
];

$htmlPluginJS = [
    '/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
    // '/assets/admin/js/pages/blankon.sign',
];

$htmlCustomJS = [
    // '/assets/admin/js/pages/blankon.dashboard.investor',
];

$layoutPath     = 'login';

renderView('pages/login');
?>
