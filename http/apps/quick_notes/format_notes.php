<?php

$tr = '';
if ( ! empty($results) ) {
    foreach ( $results as $row ) {
        $tr .= '<tr id="row_' . $row['id'] . '">';
            $tr .= '<td class="text-center border-top">' . displayDateTime($row['created_at']) . '</td>';
            $tr .= '<td class="border-top">' . decodeQuote($row['name']) . '</td>';
            $tr .= '<td class="border-top"><span data-quick_note_id="' . $row['id'] . '" class="btn btn-danger btn-xs btn-push cQuickNoteDelete"><i class="fa fa-times"></i> Delete</span></td>';
        $tr .= '</tr>';
    }
}

?>
