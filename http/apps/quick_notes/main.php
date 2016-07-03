<?php
$loginInfo = Session::get('user');

$results = (new Quick_Notes)->allBy($loginInfo['id']);
require_once(getPath('apps') . '/quick_notes/format_notes.php');

die(json_encode(['tr' => $tr]));
?>
