<?php
$customerId = $httpRequest->get['customer_id'];
$customer_note = $httpRequest->get['customer_note'];
$loginInfo = Session::get('user');

(new Customers)->udpate(['last_call_date' => date('Y-m-d H:i:s')], $customerId, $loginInfo['account_hash']);
(new Customers_Contact_Histories)->save([
		'customer_id' => $customerId,
		'notes' => encodeQuote($customer_note),
		'created_by' => $loginInfo['id'],
	]);

die(json_encode(['error' => 0, 'msg' => 'success']));