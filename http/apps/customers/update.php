<?php
$customerId = $httpRequest->get['customer_id'];
$loginInfo = Session::get('user');

(new Customers)->udpate(['last_call_date' => date('Y-m-d H:i:s')], $customerId, $loginInfo['account_hash']);

die(json_encode(['error' => 0, 'msg' => 'success']));