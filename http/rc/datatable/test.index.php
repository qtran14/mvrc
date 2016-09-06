<?php
if ( ! $this->Request->is('ajax') ) die("Invalid request.");


$table = 'test';
$primaryKey = "{$table}.id";
$extraWhere = "";

$columns = [
    [ 'dt' => 0,  'db' => 'id' ],
    [ 'dt' => 1,  'db' => 'name' ],
    [ 'dt' => 2,  'db' => 'created_at' ],
];

$results = SSP::simple(DbFactory::getInstance(), $this->Request->get, $table, $primaryKey, $columns, $extraWhere);
// dd($results);

$out = [];
for ($i = 0; $i < count($results['data']); $i++) {
	$data = $results['data'][$i];
	$row = [];

    $row[] = $data['id'];
    $row[] = $data['name'];
    $row[] = $data['created_at'];

    $out[] = $row;
}

$results['data'] = $out;


die(json_encode($results));
