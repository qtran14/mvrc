<?php
$loginInfo = Session::get('user');

$table = 'resident_members';
$primaryKey = "{$table}.id";
$extraWhere = "";



$columns = [
    [ 'dt' => 0, 'alias' => 'name',         'db' => 'CONCAT(resident_members.first_name, " ", resident_members.last_name)' ],
    [ 'dt' => 1,                             'db' => 'resident_members.phone' ],
    [ 'dt' => 2,                             'db' => 'resident_members.email' ],
    [ 'dt' => 3,                             'db' => 'resident_members.id' ],
    [ 'dt' => 4,                             'db' => 'resident_members.extension' ],
];


$results = SSP::simple(getDB(), $httpRequest->get, $table, $primaryKey, $columns, $extraWhere);


$out = [];
$total = 0.00;
for ($i = 0; $i < count($results['data']); $i++) {
    $data = $results['data'][$i];

    $row = [];

    $row[] = $data['name'];
    $row[] = displayPhone($data['phone']) . ( ! empty($data['extension']) ? ' x' . $data['extension'] : '');
    $row[] = $data['email'];
    $row[] = '<span data-target=".member_resident_histories" data-toggle="modal" class="btn btn-sm btn-theme btn-xs btn-push view_info" data-member_id="' . $data['id'] . '"><i class="fa fa-eye"></i> View</span>';

    $out[] = $row;
}
$results['data'] = $out;


die(json_encode($results));
?>
