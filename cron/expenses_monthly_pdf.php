<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 define('DS', DIRECTORY_SEPARATOR);
 define('ROOT_DIR', '/home/appserver/documents/htdocs');
 define('PLUGINS_DIR',   ROOT_DIR . DS . 'plugins');
 define('CRON_DIR',    ROOT_DIR . DS . 'cron');


require_once ROOT_DIR . DS . '.env.php';
require_once ROOT_DIR . DS . 'global_helpers.php';
require_once CRON_DIR . DS . 'config.php';


$sql = "SELECT hash FROM accounts";
$results = $db->rawQuery($sql);

$thisMonth = date('Y-m') . '-01';

foreach ( $results as $row ) {
	$accountHash = $row['hash'];

	$sql = "SELECT 
				expenses.id,
				expenses.on_date,
				expenses.name,
				expenses.amount,
				expenses.description,
				expenses_categories.name AS category_name,
				(SELECT group_concat(expenses_pictures.name) FROM expenses_pictures WHERE expenses_pictures.expense_hash=expenses.hash) AS images

			FROM expenses

				LEFT JOIN expenses_categories ON 1=1
											AND expenses_categories.id=expenses.category_id

			WHERE 1=1
				AND expenses.on_date<'{$thisMonth}'
				AND expenses.status_id=2
				AND expenses.account_hash='{$accountHash}'
			ORDER BY expenses.on_date ASC
			";
	$expenses = $db->rawQuery($sql);

	if ( ! empty($expenses) ) {
		$table = '';
		$table .= '<html>
					<head> 
						<style type="text/css">
							@prince-pdf {prince-pdf-print-scaling: none}
							@page { size: US-Legal landscape; margin: 0.4in }
							table {
							  border-collapse: collapse;
							}
							tr.draw-line td { 
							  border-top:1pt solid black;
							}
							tr.draw-line th { 
							  border-top:1pt solid black;
							}
						</style>
					</head>
					<body><h1>Expense History</h1>';
		$table .= '<table>';
			$table .= '<tr class="draw-line">';
				$table .= '<th style="width:120px; padding: 0 2px;">Date</th>';
				$table .= '<th style="width:250px; padding: 0 2px;">Category</th>';
				$table .= '<th style="width:350px; padding: 0 2px;">Name</th>';
				$table .= '<th style="padding: 0 2px;">Notes</th>';
				$table .= '<th style="width:80px; padding: 0 2px;">Total</th>';
			$table .= '</tr>';

		$grandTotal = 0.00;

		foreach ( $expenses as $row ) {
			$sql = "UPDATE expenses SET expenses.status_id=3 WHERE expenses.id='{$row['id']}'";
			$db->rawQuery($sql);


			$grandTotal += $row['amount'];

			$table .= '<tr class="draw-line">';
				$table .= '<td>' . displayDate($row['on_date']) . '</td>';
				$table .= '<td>' . $row['category_name'] . '</td>';
				$table .= '<td>' . decodeQuote($row['name']) . '</td>';
				$table .= '<td>' . decodeQuote($row['description']) . '</td>';
				$table .= '<td>$' . number_format($row['amount'], 2) . '</td>';
			$table .= '</tr>';

			if ( ! empty($row['images']) ) {
				$imageArray = explode(',', $row['images']);
				$table .= '<tr>';
					// $table .= '<td valign="top">Pictures</td>';
					$table .= '<td colspan="5">';
						foreach ( $imageArray as $image ) $table .= '<img style="margin:5px 10px" src="' . PUBLIC_DIR . DS . 'accounts' . DS . $accountHash . DS . 'images/medium' . DS . $image . '" width="150px;" />';
					$table .= '</td>';

				$table .= '</tr>';
			}
		}

		$table .= '<tr class="draw-line">';
			$table .= '<th colspan="4" align="right">Total: </th>';
			$table .= '<th>$' . number_format($grandTotal, 2) . '</th>';
		$table .= '</tr>';

		$table .= '</table>';
		$table .= '</body></html>';

		$location = 'accounts' . DS . $accountHash . DS . 'expenses/pdfs';
		mkdirIfNotExist($location, 'public');

		$filename = 'expenses_' . date('Y-m-d');
		$htmlFile = getPath('public') . DS . $location . DS . $filename . '.html';
		$fp = fopen($htmlFile, 'w');
		fwrite($fp, $table);
		fclose($fp);

		$pdfFile = getPath('public') . DS . $location . DS . $filename . '.pdf';
		$prince = new Prince(PRINCE_PDF);
		$prince->convert_file_to_file($htmlFile, $pdfFile);
		unlink($htmlFile);

		$to[] = [
			'address' => 'quoctran.cs.titan@gmail.com', 
			'name' => ''
		];
		$from = [
			'address' => 'friends.onf.2010@gmail.com',
			'name' => ''
		];
		$subject = 'Monthly Expenses';
		$body = 'Attached is your monthly expenses.';
		$attachments[] = $pdfFile;
		sendMail($to, $subject, $body, $from, $attachments);
	}
}