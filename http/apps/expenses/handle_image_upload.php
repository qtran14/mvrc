<?php
// dd($httpRequest);
$hash = $httpRequest->get['id'];
if ( empty($hash) ) die('Invalid request');

$uploadedFile =$httpRequest->file;
if ( empty($uploadedFile) ) die('Invalid request');

$loginInfo = Session::get('user');

$expenseInfo = (new Expenses)->info($hash, $loginInfo['account_hash']);
if ( empty($expenseInfo) ) die('Invalide request');

$fileComponents = explode('.', strtolower(trim($uploadedFile['file']['name'])));
$fileExt = end($fileComponents);
if ( ! in_array($fileExt, ['jpeg', 'jpg', 'png']) ) die('Invalid request');

$expensePicture = new Expenses_Pictures;
$name = $hash . '_' . ($expensePicture->totalRows() + 1) . '.' . $fileExt;

$from = $uploadedFile['file']['tmp_name'];

$location = 'accounts' . DS . $loginInfo['account_hash'] . DS . 'images';
mkdirIfNotExist($location . DS . 'thumbnail', 'public');
mkdirIfNotExist($location . DS . 'medium', 'public');
mkdirIfNotExist($location . DS . 'large', 'public');
mkdirIfNotExist($location . DS . 'original', 'public');


$to = getPath('public') . DS . 'accounts' . DS . $loginInfo['account_hash'] . DS . 'images/original' . DS . $name;
if ( move_uploaded_file($from, $to) ) {
	$inputData = [
		'expense_hash' => $hash,
		'name' => $name,
		'uploaded_name' => encodeQuote($uploadedFile['file']['name']),
		'created_by' => $loginInfo['id'],
	];

	$expensePicture->save($inputData);


	(new SimpleImage($to))->fit_to_width(150)->save(getPath('public') . DS . 'accounts' . DS . $loginInfo['account_hash'] . DS . 'images/thumbnail' . DS . $name);
	(new SimpleImage($to))->fit_to_width(350)->save(getPath('public') . DS . 'accounts' . DS . $loginInfo['account_hash'] . DS . 'images/medium' . DS . $name);
	(new SimpleImage($to))->fit_to_width(700)->save(getPath('public') . DS . 'accounts' . DS . $loginInfo['account_hash'] . DS . 'images/large' . DS . $name);

	die(json_encode(['error' => 0, 'msg' => 'success']));
}

die(json_encode(['error' => 1, 'msg' => 'fail']));