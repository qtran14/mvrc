<?php
// dd($httpRequest);
$post = $httpRequest->post;

if ( isset($post['upload']) && $post['upload'] == '1' ) {
	$uploadedFile = $httpRequest->file;
	$loginInfo = Session::get('user');
	$accountUpload = [
		'added' => [],
		'existed' => [],
	];


	$filename = $uploadedFile['upload_file']['tmp_name'];
	if ( ($handle = fopen($filename, "r")) !== FALSE ) {
		$firstRow = true;
		$columnMap = [];
		$customer = new Customers;

		while ( ($data = fgetcsv($handle, 1000, ",")) !== FALSE ) {
			if ( count($data) == 0 ) continue;
			if ( $firstRow ) {
				$columnMap = array_flip($data);
				$firstRow = false;

				continue;
			}

			$firstName = $data[$columnMap['FIRST_NAME']];
			$lastName = $data[$columnMap['LAST_NAME']];
			$email = $data[$columnMap['EMAIL']];
			$phone = $data[$columnMap['PHONE']];
			$lastCallDate = $data[$columnMap['LAST_CALL_DATE']];

			if ( empty($firstName) ) continue;
			if ( $customer->existBy(encodeQuote($firstName), encodeQuote($lastName), $loginInfo['account_hash']) ) {
				$accountUpload['existed'][] = $firstName . ' ' . $lastName;
				continue;
			}

			$accountUpload['added'][] = $firstName . ' ' . $lastName;

			$inputData = [
				'account_hash' => $loginInfo['account_hash'],
				'first_name' => encodeQuote($firstName),
				'last_name' => encodeQuote($lastName),
				'email' => encodeQuote($email),
				'phone' => preg_replace('/[^0-9]/', '', $phone),
				'last_call_date' => empty($lastCallDate) ? NULL : dbDateTime($lastCallDate),
				'status' => 1,
				'created_by' => $loginInfo['id'],
			];

			$customer->save($inputData);
		}

		fclose($handle);
	}


	// Session::setFlash('success', "Customers Added.");
	Session::set('upload_stat', $accountUpload);
	redirect('/customers/upload_stat');
}

require_once abort();