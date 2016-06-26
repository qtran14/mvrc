<?php
$loginInfo = Session::get('user');
$status = $httpRequest->get['status'];

$table = 'expenses';
$primaryKey = "{$table}.id";
$extraWhere = " {$table}.account_hash = '{$loginInfo['account_hash']}' ";

if ( ! empty( $status ) ) $extraWhere .= " AND  {$table}.status_id= '{$status}' ";
// dd($httpRequest->get);


$columns = [
    [ 'dt' => 0,                            'db' => 'hash' ],
    [ 'dt' => 1,                            'db' => 'on_date' ],
    [ 'dt' => 2, 'alias' => 'category',     'db' => '(SELECT expenses_categories.name FROM expenses_categories WHERE expenses_categories.id = ' . $table . '.category_id LIMIT 1)' ],
    [ 'dt' => 3,                            'db' => 'name' ],
    [ 'dt' => 4,                            'db' => 'description' ],
    [ 'dt' => 5,                            'db' => 'amount' ],
    [ 'dt' => 6, 'alias' => 'status',       'db' => '(SELECT expenses_status.name FROM expenses_status WHERE expenses_status.id = ' . $table . '.status_id LIMIT 1)' ],
];


$results = SSP::simple(getDB(), $httpRequest->get, $table, $primaryKey, $columns, $extraWhere);
// dd($results);

function buildEditBtn($id) {
    return '<a class="btn btn-sm btn-primary btn-xs btn-push" data-toggle="tooltip" data-placement="top" data-original-title="Edit" href="' . APP_URL . 'expenses/edit?id=' . $id . '"><i class="fa fa-pencil"></i> Edit</a>';
}

function getImage($expenseHash, $accountHash) {
    global $db;

    $sql = "SELECT expenses_pictures.name FROM expenses_pictures WHERE expenses_pictures.expense_hash='{$expenseHash}' LIMIT 1";
    $result = $db->rawQuery($sql);

    $img = '';
    if ( ! empty($result) ) {
        $img = '<img src="/accounts/' . $accountHash . '/images/thumbnail/' . $result['0']['name'] . '" width="150px;" />';
    }

    return $img;
}

$out = [];
for ($i = 0; $i < count($results['data']); $i++) {
    $data = $results['data'][$i];
    $row = [];

    $row[] = getImage($data['hash'], $loginInfo['account_hash']);
    $row[] = displayDate($data['on_date']);
    $row[] = $data['category'];
    $row[] = decodeQuote($data['name']);
    $row[] = str_replace(['<br/>', '<br />'], "\n", decodeQuote($data['description']));
    $row[] = '$'. number_format($data['amount'], 2);
    $row[] = $data['status'];
    $row[] = buildEditBtn($data['hash']);
    // $row[] = $view . $edit;

    $out[] = $row;
}
$results['data'] = $out;


die(json_encode($results));
?>