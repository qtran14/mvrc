<?php
$layoutPath     = 'default';
$htmlPageTitle  = 'Brilliance Redefined';
$htmlPluginCSS  = [];
$htmlCustomCSS  = [];
$htmlPluginJS   = [];
$htmlCustomJS   = [];
$data 			= [];

if ( Session::has('post_data') ) {
	$data = Session::get('post_data');
	Session::delete('post_data');
}

// dd($_SESSION); 
// dd($httpRequest);
if ( in_array($httpRequest->route, ['/about', '/gallery', '/index']) && file_exists(getPath('apps') . $httpRequest->route . '.php') ) {
	require_once getPath('apps') . $httpRequest->route . '.php';die;
}


if ( ! Session::isLogin() ) {
	require_once getLogin();
	die;
}

$requestIndexFile = getPath('apps') . $httpRequest->route . '/index.php';
$requestFile = getPath('apps') . $httpRequest->route . '.php';
if ( file_exists($requestFile) ) require_once $requestFile;
else if ( file_exists($requestIndexFile) ) require_once $requestIndexFile;
else require_once abort();
?>
