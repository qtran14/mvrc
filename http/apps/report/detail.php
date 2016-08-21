<?php
if ( ! $httpRequest->is('ajax') ) die("Invalid request.");

$report = encodeQuote($httpRequest->get['report']);
$catetory_id = encodeQuote($httpRequest->get['category']);
$where_category = '';
if ( ! empty($catetory_id) ) $where_category = "AND report_detail.category_id = '{$catetory_id}'";
$account_info = Session::get('account_info');


$results = $db->rawQuery("SELECT 
				expenses.on_date,
				expenses_categories.name AS category_name,
				expenses.name,
				expenses.description,
				expenses.amount,
				expenses_status.name AS status_name,
				(SELECT expenses_pictures.name FROM expenses_pictures WHERE expenses_pictures.expense_hash=expenses.hash LIMIT 1) AS picture,
				expenses.hash
		FROM report
			LEFT JOIN report_detail ON 1=1
									AND report_detail.report_id=report.id
			LEFT JOIN expenses ON 1=1
							AND expenses.id=report_detail.expense_id
			LEFT JOIN expenses_categories ON 1=1
							AND expenses_categories.id=expenses.category_id
			LEFT JOIN expenses_status ON 1=1
							AND expenses_status.id=expenses.status_id
		WHERE 1=1
			AND report.name LIKE '{$report}'
			{$where_category}
			AND expenses.account_hash LIKE '{$account_info['hash']}'
		");

$tr = '';
if ( ! empty($results) ) {
	$total = 0.00;

	foreach ( $results as $row ) {
		$total += $row['amount'];
		$picture = '&nbsp;';
		if ( ! empty($row['picture']) ) $picture = '<img class="zoom-images" width="150px;" src="/accounts/'. $account_info['hash'] . '/images/thumbnail/' . $row['picture'] . '" data-zoom-image="/accounts/'. $account_info['hash'] . '/images/large/' . $row['picture'] . '">';

		$tr .= '<tr>';
			$tr .= '<td>' .  $picture . '</td>';
			$tr .= '<td>' . displayDate($row['on_date']) . '</td>';
			$tr .= '<td>' . $row['category_name'] . '</td>';
			$tr .= '<td>' . encodeQuote($row['name']) . '</td>';
			$tr .= '<td>' . encodeQuote($row['description']) . '</td>';
			$tr .= '<td>$' . number_format($row['amount'], 2) . '</td>';
			$tr .= '<td>' . $row['status_name'] . '</td>';
			$tr .= '<td><a data-category="' . $catetory_id . '" data-report="' . $report . '" data-expense="' . $row['hash'] . '" href="#" class="btn btn-sm btn-primary btn-xs cEditReportDetail" data-target=".cReportDetailEditModal" data-keyboard="false" data-backdrop="static" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>';
		$tr .= '</tr>';
	}

	$tfoot = '<tr>';
		$tfoot .= '<th class="text-right" colspan="5">Total</th>';
		$tfoot .= '<th colspan="3">$' . number_format($total, 2) . '</th>';
	$tfoot .= '</tr>';
}

die(json_encode([
		'error' => 0,
		'tr' => $tr,
		'tfoot' => $tfoot,
	]));
?>
