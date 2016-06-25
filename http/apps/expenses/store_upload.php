<?php
// dd($httpRequest);
$post = $httpRequest->post;

if ( isset($post['upload']) && $post['upload'] == '1' ) {
	$uploadedFile = $httpRequest->file;

	$loginInfo = Session::get('user');

	$filename = $uploadedFile['expense_file']['tmp_name'];

	if ( ($handle = fopen($filename, "r")) !== FALSE ) {
		$firstRow = true;
		$columnMap = [];
		$expense = new Expenses;

		while ( ($data = fgetcsv($handle, 1000, ",")) !== FALSE ) {
			if ( count($data) == 0 ) continue;
			if ( $firstRow ) {
				$columnMap = array_flip($data);
				$firstRow = false;

				continue;
			}

			$date = $data[$columnMap['ON_DATE']];
			$name = $data[$columnMap['NAME']];
			$categoryId = $data[$columnMap['CATEGORY']];
			$amount = $data[$columnMap['AMOUNT']];
			$notes = $data[$columnMap['NOTES']];

			if ( empty($date) || empty($name) || empty($categoryId) || empty($amount) ) continue;

			$inputData = [
				'hash' => getUUID(60, getDB(), 'expenses', 'hash'),
				'account_hash' => $loginInfo['account_hash'],
				'on_date' => dbDateTime($date),
				'name' => encodeQuote($name),
				'category_id' => $categoryId,
				'status_id' => 1,
				'amount' => $amount,
				'description' => encodeQuote($notes),
				'created_by' => $loginInfo['id'],
			];

			$expense->save($inputData);
		}

		fclose($handle);
	}


	// $inputData = [
	// 	'hash' => getUUID(60, getDB(), 'expenses', 'hash'),
	// 	'account_hash' => $loginInfo['account_hash'],
	// 	'on_date' => dbDate($post['expense_date']),
	// 	'name' => encodeQuote($post['expense_name']),
	// 	'category_id' => $post['expense_category'],
	// 	'status_id' => 1,
	// 	'amount' => $post['expense_total'],
	// 	'description' => encodeQuote($post['expense_notes']),
	// 	'created_by' => $loginInfo['id'],
	// ];

	// $expense = new Expenses;
	// $expense->save($inputData);

	Session::setFlash('success', "Expense Added.");
	redirect('/expenses');
}