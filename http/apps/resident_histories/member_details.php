<?php
// dd($httpRequest);
$member_id = $httpRequest->get['member_id'];

$histories = (new ResidentHistories)->ofMember($member_id);

if ( ! empty($histories) ) {
    $table = '<table class="table table-striped table-lilac dataTable">';
    $table .= '<thead>';
        $table .= '<tr>';
            $table .= '<th>Landlord</th>';
            $table .= '<th>Phone</th>';
            $table .= '<th>Email</th>';
            $table .= '<th>Start Date</th>';
            $table .= '<th>End Date</th>';
            $table .= '<th>Address</th>';
            $table .= '<th>City</th>';
            $table .= '<th>State</th>';
            $table .= '<th>Zip Code</th>';
        $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    foreach ( $histories as $row ) {
        $table .= '<tr>';
            $table .= '<td>' . $row['landlord'] . '</td>';
            $table .= '<td>' . displayPhone($row['phone']) . ( ! empty($row['extension']) ? " x" . $row['extension'] : "") . '</td>';
            $table .= '<td>' . $row['email'] . '</td>';
            $table .= '<td>' . displayDate($row['start_date']) . '</td>';
            $table .= '<td>' . displayDate($row['end_date']) . '</td>';
            $table .= '<td>' . $row['address_1'] . ( ! empty($row['address_2']) ? " " . $row['address_2'] : "") . '</td>';
            $table .= '<td>' . $row['city'] . '</td>';
            $table .= '<td>' . $row['state'] . '</td>';
            $table .= '<td>' . $row['zip_code'] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';

    die(json_encode(['error' => 0, 'table' => $table]));
}

die(json_encode(['error' => 0, 'table' => '']));
