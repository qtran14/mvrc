<?php
$uploadedFile =$httpRequest->file;
if ( empty($uploadedFile) ) die('Invalid request');

$loginInfo = Session::get('user');

$fileComponents = explode('.', strtolower(trim($uploadedFile['file']['name'])));
$fileExt = end($fileComponents);
if ( ! in_array($fileExt, ['jpeg', 'jpg', 'png']) ) die('Invalid request');

$gallery = new Galleries;
$name = getUUID(60) . '.' . $fileExt;

$from = $uploadedFile['file']['tmp_name'];

$location = 'galleries' . DS . 'images';
mkdirIfNotExist($location . DS . 'thumbnail', 'public');
mkdirIfNotExist($location . DS . 'medium', 'public');
mkdirIfNotExist($location . DS . 'large', 'public');
mkdirIfNotExist($location . DS . 'original', 'public');


$to = getPath('public') . DS . 'galleries' . DS . 'images/original' . DS . $name;
if ( move_uploaded_file($from, $to) ) {
	$inputData = [
		'name' => $name,
		'uploaded_name' => encodeQuote($uploadedFile['file']['name']),
		'created_by' => $loginInfo['id'],
	];

	$gallery->save($inputData);


	(new SimpleImage($to))->fit_to_width(150)->save(getPath('public') . DS . 'galleries' . DS . 'images/thumbnail' . DS . $name);
	(new SimpleImage($to))->fit_to_width(350)->save(getPath('public') . DS . 'galleries' . DS . 'images/medium' . DS . $name);
	(new SimpleImage($to))->fit_to_width(700)->save(getPath('public') . DS . 'galleries' . DS . 'images/large' . DS . $name);

	die(json_encode(['error' => 0, 'msg' => 'success']));
}

die(json_encode(['error' => 1, 'msg' => 'fail']));
