<?php
if ( ! $httpRequest->is('ajax') ) die("Invalid request.");


$post = $httpRequest->post;
$loginInfo = Session::get('user');
$account_info = Session::get('account_info');

function validateEdit($post, $loginInfo) {
    if ( ! (new Expenses)->exist($post['id'], $loginInfo['account_hash']) ) {
        die(json_encode([
            'error' => 1,
            'msg' => 'Invalid request',
        ]));
    }

    $validator = new GUMP;

    $rules = [
        'expense_date' => 'required|date',
        'expense_category' => 'required|integer',
        'expense_name' => 'required',
        'expense_total' => 'required|numeric',
    ];

    $filters = [
        'expense_date' => 'trim',
        'expense_category' => 'trim',
        'expense_name' => 'trim',
        'expense_total' => 'trim',
        'expense_notes' => 'trim',
    ];

    $postDate = $post['expense_date'];
    $post['expense_date'] = dbDate($postDate);
    $post = $validator->filter($post, $filters);

    $validated = $validator->validate($post, $rules);

    if ( $validated === TRUE ) return $validated;


    die(json_encode([
            'error' => 1,
            'msg' => 'Invalid request',
        ]));
}

validateEdit($post, $loginInfo);

$expense = new Expenses;

$expense_info = $expense->info($post['id'], $account_info['hash']);

$expense->update([
    'on_date' => dbDate($post['expense_date']),
    'name' => encodeQuote($post['expense_name']),
    'category_id' => $post['expense_category'],
    'amount' => $post['expense_total'],
    'description' => encodeQuote($post['expense_notes']),
    'last_updated_by' => $loginInfo['id'],
], $post['id'], $loginInfo['account_hash']);

(new ReportDetail)->update([
    'category_id' => $post['expense_category'],
    'updated_by' => $loginInfo['id'],
], $expense_info['id']);

die(json_encode([
        'error' => 0,
        'msg' => 'Successfully updated.',
    ]));
?>
