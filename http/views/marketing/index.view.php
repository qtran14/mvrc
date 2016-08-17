<?php
// dd($data);
?>
<div class="header-content">
    <h2><i class="fa fa-dollar"></i>Marketing <span>Products used for deals/promotions - detail explaination of products usage.</span></h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-tab panel-tab-double shadow">
                <div class="panel-heading no-padding">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="/marketing/add" class="btn btn-theme">Add</a>
                            <a href="/marketing/upload" class="btn btn-lilac">Upload...</a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <br />

                    <ul class="nav nav-tabs">
                        <li class="active nav-border nav-border-top-warning">
                            <a href="#tab6-1" data-toggle="tab" class="text-center">All</a>
                        </li>
                        <li class="nav-border nav-border-top-success">
                            <a href="#tab6-2" data-toggle="tab" class="text-center">Verified</a>
                        </li>
                        <li class="nav-border nav-border-top-info">
                            <a href="#tab6-3" data-toggle="tab" class="text-center">Completed</a>
                        </li>
                        <li class="nav-border nav-border-top-danger">
                            <a href="#tab6-4" data-toggle="tab" class="text-center">Cancelled</a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab6-1">
                            <table id="marketing_history_all" class="table table-striped table-inverse">
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
                                
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th colspan="3" id="iGrandTotalAll">&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-2">
                            <table id="marketing_history_verified" class="table table-striped table-inverse">
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
                                
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th colspan="3" id="iGrandTotalVerified">&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-3">
                            <table id="marketing_history_completed" class="table table-striped table-inverse">
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
                                
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th colspan="3" id="iGrandTotalCompleted">&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-4">
                            <table id="marketing_history_cancelled" class="table table-striped table-inverse">
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
                                
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th colspan="3" id="iGrandTotalCancelled">&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- 
<footer class="footer-content">
    Here is the footer
</footer> -->
