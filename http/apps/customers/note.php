<?php
$customer_id = $httpRequest->get['customer_id'];
$loginInfo = Session::get('user');

$response = [
	'error' => 1,
	'msg' => '<span class="text-danger" style="padding: 10px 10px;">Invalid request.</span>',
];

if ( (new customers)->belongsTo($customer_id, $loginInfo['account_hash']) ) {
	$contactHistory = (new Customers_Contact_Histories)->all($customer_id);
	$table = '<table class="table table-striped">';
	    $table .= '<thead>';
	        $table .= '<tr>';
	            $table .= '<th class="border-right" style="width: 250px;">Contact By</th>';
	            $table .= '<th class="text-center border-right" style="width: 200px;">Date</th>';
                $table .= '<th>Notes</th>';
            $table .= '</tr>';
        $table .= '</thead>';
        $table .= '<tbody>';

        $customer_name = '';
		foreach ( $contactHistory as $row ) {
			$customer_name = $row['first_name'] . ' ' . $row['last_name'];

			$table .= '<tr>';
	            $table .= '<td border-right">' . $row['username'] . '</td>';
	            $table .= '<td class="text-center border-right">' . displayDateTime($row['contact_date']) . '</td>';
	            $table .= '<td>' . decodeQuote($row['notes']) . '</td>';
	        $table .= '</tr>';
		}
		$table .= '</tbody>';
	$table .= '</table>';

	$response = [
		'error' => 0,
		'msg' => '',
		'table_note' => $table,
		'customer_name' => $customer_name,
	];
}

die(json_encode($response));
