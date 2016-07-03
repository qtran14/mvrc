<?php
$loginInfo = Session::get('user');
$id = encodeQuote($httpRequest->get['id']);

$response = [
	'error' => 1,
	'msg' => 'Invalid request',
];
if ( empty($id) ) die(json_encode($response));


(new Quick_Notes)->update([
		'hidden' => 1,
		'last_updated_by' => $loginInfo['id']
	], $id, $loginInfo['id']);

$response = [
	'error' => 0,
	'msg' => 'success',
];
die(json_encode($response));
?>
