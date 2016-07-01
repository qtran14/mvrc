<?php
$loginInfo = Session::get('user');

$table = 'customers';
$primaryKey = "{$table}.id";
$extraWhere = " {$table}.account_hash = '{$loginInfo['account_hash']}' ";



$columns = [
    [ 'dt' => 0,                            'db' => 'first_name' ],
    [ 'dt' => 1,							'db' => 'last_name' ],
    [ 'dt' => 2,                            'db' => 'email' ],
    [ 'dt' => 3,                            'db' => 'phone' ],
    [ 'dt' => 4,                            'db' => 'last_call_date' ],
    [ 'dt' => 5,                            'db' => 'id' ],
];


$results = SSP::simple(getDB(), $httpRequest->get, $table, $primaryKey, $columns, $extraWhere);


function formatDispayDate($date) {
	if ( empty($date) || $date == '0000:00:00' ) return '';
	if ( empty($date) || $date == '0000:00:00 00:00:00' ) return '';

	return displayDate($date);
}

$out = [];
$total = 0.00;
for ($i = 0; $i < count($results['data']); $i++) {
    $data = $results['data'][$i];
    
    $row = [];

    $row[] = $data['first_name'];
    $row[] = $data['last_name'];
    $row[] = $data['email'];
    $row[] = $data['phone'];
    $row[] = formatDispayDate($data['last_call_date']);
    $row[] = '<a href="#" class="btn btn-danger btn-xs btn-push markAsCalledBtn" data-customer_id="' . $data['id'] . '"><i class="fa fa-phone"></i> Mark as Called</a>';

    $out[] = $row;
}
$results['data'] = $out;


die(json_encode($results));
?>
