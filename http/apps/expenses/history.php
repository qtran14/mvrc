<?php
$loginInfo = Session::get('user');
$table = 'expenses';
$primaryKey = 'id';
$extraWhere = "account_hash = '{$loginInfo['account_hash']}'";
// $extraWhere = $this->tableName .'.expense_status_id='. $getInput['status'];
// dd($httpRequest->get);


$columns = array(
    array(
        'db' => 'hash',
        'dt' => 0
    ),
    array(
        'db' => 'on_date',
        'dt' => 1,
    ),
    array(
        'db' => '(SELECT expenses_categories.name FROM expenses_categories WHERE expenses_categories.id = ' . $table . '.category_id LIMIT 1)',
        'alias' => 'category',
        'dt' => 2
    ),
    array(
        'db' => 'name',
        'dt' => 3,
    ),
    array(
        'db' => 'description',
        'dt' => 4,
    ),
    array(
        'db' => 'amount',
        'dt' => 5,
    ),
    array(
        'db' => '(SELECT expenses_status.name FROM expenses_status WHERE expenses_status.id = ' . $table . '.status_id LIMIT 1)',
        'alias' => 'status',
        'dt' => 6
    ),
);


$results = SSP::simple(getDB(), $httpRequest->get, $table, $primaryKey, $columns, $extraWhere);
// dd($results);

 $out = [];
for ($i = 0; $i < count($results['data']); $i++) {
    $data = $results['data'][$i];
    $row = [];

    $image = '&nbsp;';
    // $images = $this->query("SELECT name, uploaded_name FROM expense_images WHERE expense_id = '{$data['id']}' AND removed='no' ORDER BY id DESC");
    // if ( !empty($images) ) {
    //     $show = true;
    //     $image = '<div align="center">';
    //     $aTag = '<div align="center" style="width: 100px">';

    //     foreach ( $images as $imageRow ) {
    //         if ($show) {
    //             $image .= '<img id="main_image_'. $i .'" src="/'. getUserAccount() .'/images/expenses/thumbnail/'. $imageRow['name'] .'" />';
    //             $show = FALSE;
    //         }

    //         $aTag .= '<a class="pull-left event event-special swap-image" title="View Image" data-toggle="tooltip" data-event-class="event-special" data-event-id="'. $i .'" data-image-src="/'. getUserAccount() .'/images/expenses/thumbnail/'. $imageRow['name'] .'" href="" data-original-title=""> </a>';
    //     }

    //     $aTag .= '</div>';

    //     $image .= '<p>'. $aTag .'</p></div>';
    // }


    // $view = '<a class="btn btn-primary btn-xs rounded" data-original-title="View" data-placement="top" data-toggle="tooltip" href="/expenses/view/'. $data['unique_id'] .'"><i class="fa fa-eye"></i></a>';
    // $edit = '&nbsp;';
    // if ( strcasecmp('completed', $data['status']) != 0 )$edit = '<a class="btn btn-primary btn-xs rounded" data-original-title="Edit" data-placement="top" data-toggle="tooltip" href="/expenses/edit/'. $data['unique_id'] .'"><i class="fa fa-pencil"></i></a>';


    $row[] = $image;
    $row[] = displayDate($data['on_date']);
    $row[] = $data['category'];
    $row[] = decodeQuote($data['name']);
    $row[] = str_replace(['<br/>', '<br />'], "\n", decodeQuote($data['description']));
    $row[] = '$'. number_format($data['amount'], 2);
    $row[] = $data['status'];
    $row[] = '&nbsp;';
    // $row[] = $view . $edit;

    $out[] = $row;
}
$results['data'] = $out;


die(json_encode($results));
?>
