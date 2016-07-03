<?php
$loginInfo = Session::get('user');
$name = encodeQuote(nl2br($httpRequest->get['quick_note']));

if ( empty($name) ) die('Invalid request');
$quick_note = new Quick_Notes;
$quick_note->save([
		'name' => $name,
		'created_by' => $loginInfo['id']
	]);


$results = $quick_note->allBy($loginInfo['id']);
require_once(getPath('apps') . '/quick_notes/format_notes.php');

die(json_encode(['tr' => $tr]));
?>
