<?php
$status = $httpRequest->get['status'];
$loginInfo = Session::get('user');

$table = 'customers';
$primaryKey = "{$table}.id";
$extraWhere = " {$table}.account_hash = '{$loginInfo['account_hash']}' ";

if ( $status > 0 ) $extraWhere .= " AND {$table}.status = '{$status}' ";



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
	if ( empty($date) || $date == '0000:00:00' || $date == '0000:00:00 00:00:00' ) return '';
	return displayDate($date);
}

function buildBtn($id) {
    $btn = ''; 
    $btn .= '<a href="#" class="btn btn-danger btn-xs btn-push markAsCalledBtn" data-toggle="modal" data-target=".mCompleteCall" data-customer_id="' . $id . '"><i class="fa fa-phone"></i> Complete Call</a>';
    $btn .= '<a href="/customers/edit?id=' . $id . '" class="btn btn-info btn-xs btn-push"><i class="fa fa-pencil"></i> Edit</a>';
    if ( (new Customers)->hasNote($id) ) {
        $btn .= '<a href="#" class="btn btn-warning btn-xs btn-push cNote" data-toggle="modal" data-target=".mNote" data-customer_id="' . $id . '"><i class="fa fa-sticky-note-o"></i> Notes</a>';
    }

    
    return $btn;
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
    $row[] = buildBtn($data['id']);

    $out[] = $row;
}
$results['data'] = $out;


die(json_encode($results));
?>
