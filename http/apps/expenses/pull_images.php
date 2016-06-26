<?php
$hash = $httpRequest->get['id'];
$loginInfo = Session::get('user');

$images = (new Expenses_Pictures)->belongsTo($hash);

$imageArray = [];
foreach ( $images as $image ) $imageArray[] = '<li class="mix category-animal" style="display: inline-block;"><div class="gallery-item rounded shadow"><a target="_blank" class="gallery-img" href="/accounts/' . $loginInfo['account_hash'] . '/images/large/' . $image['name'] . '"><img src="/accounts/' . $loginInfo['account_hash'] . '/images/thumbnail/' . $image['name'] . '" width="150px" /></a></div></li>';
die(json_encode(['images' => $imageArray]));
?>
