<?php
// dd($data);
?>
<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Expenses</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Expense History</h3>

                    <div class="row">
                        <div class="col-md-8">
                            <a href="/expenses/add" class="btn btn-success">Add</a>
                            <a href="/expenses/upload" class="btn btn-theme">Upload...</a>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="selectExpenseStatus" class="col-sm-2 control-label text-right">Status</label>
                                </div>
                                <div class="col-md-10">
                                    <select id="selectExpenseStatus" class="chosen-select">
                                        <option value="">All</option>
                                        <?php 
                                            foreach ( $data['expneses_status'] as $id => $statusName ) { 
                                                $selected = '';
                                                if ( $id == 1 ) $selected = ' selected ';
                                        ?>

                                            <option value="<?= $id; ?>"<?= $selected; ?>><?= $statusName; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="expense_history_table" class="table table-striped table-inverse">
                        <thead>
                            <tr>
                                <th data-class="expand" width="100px">Picture</th>
                                <th data-hide="phone">Date</th>
                                <th data-hide="phone">Category</th>
                                <th data-hide="phone">Name</th>
                                <th data-hide="phone">Notes</th>
                                <th data-hide="phone,tablet">Total</th>
                                <th data-hide="phone,tablet">Status</th>
                                <th data-hide="phone,tablet">&nbsp;</th>
                            </tr>
                        </thead>
                        <!--tbody section is required-->
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" style="text-align:right">Total:</th>
                                <th colspan="3" id="grandTotal">&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- 
<footer class="footer-content">
    Here is the footer
</footer> -->
