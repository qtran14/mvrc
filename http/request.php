<?php
$layoutPath     = 'default';
$htmlPageTitle  = 'Brilliance Redefined';
$htmlPluginCSS  = [];
$htmlCustomCSS  = [];
$htmlPluginJS   = [];
$htmlCustomJS   = [];
$data 			= [];

// dd($_SESSION); 
// dd($httpRequest);

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
