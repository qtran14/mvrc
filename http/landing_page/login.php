<?php

if ( $this->Request->is('post') ) {
	$post = $this->Request->post;
	$username = encodeQuote($post['username']);
	$userInfo = (new User)->info($username);

	if ( password_verify($userInfo['salt'].$post['password'].$userInfo['pepper'], $userInfo['pw_hash']) ) {
		Session::set('userLogin', 1);	
		Session::set('user', $userInfo);
		Session::set('account_info', (new Account)->info($userInfo['account_hash']));

		$this->Request->referer(Session::get('referer'));	
	}

	Session::setFlash('error', 'Invalid username/password');
}


$this->html_page['title'] = 'Sign In';

$this->html_page['plugin_css'] = [
    '/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min',
    '/assets/global/plugins/bower_components/animate.css/animate.min',
    '/assets/admin/css/pages/sign',
];

$this->html_page['plugin_js'] = [
    '/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min',
];


$this->html_page['layout']     = 'login_bootstrap';
?>
