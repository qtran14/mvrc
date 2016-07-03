<div class="header-content">
    <h2><i class="fa fa-group"></i>Customers</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-tab panel-tab-double shadow">

                <!-- Start tabs heading -->
                <div class="panel-heading no-padding">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="/customers/add" class="btn btn-theme">Add</a>
                            <a href="/customers/upload" class="btn btn-danger">Upload...</a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <br />

                    <ul class="nav nav-tabs">
                        <li class="active nav-border nav-border-top-success">
                            <a href="#tab6-1" data-toggle="tab" class="text-center">
                                Active
                            </a>
                        </li>
                        <li class="nav-border nav-border-top-primary">
                            <a href="#tab6-2" data-toggle="tab" class="text-center">
                                Inactive
                            </a>
                        </li>
                        <li class="nav-border nav-border-top-danger">
                            <a href="#tab6-3" data-toggle="tab" class="text-center">
                                Do Not Call
                            </a>
                        </li>
                        <li class="nav-border nav-border-top-warning">
                            <a href="#tab6-4" data-toggle="tab" class="text-center">
                                All
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab6-1">
                            <table id="customer_table_active" class="table table-striped table-inverse">
                                <thead>
                                    <tr>
                                        <th data-class="expand">First Name</th>
                                        <th data-hide="phone">Last Name</th>
                                        <th data-hide="phone">Email</th>
                                        <th data-hide="phone">Phone</th>
                                        <th data-hide="phone">Last Call Date</th>
                                        <!-- <th data-hide="phone">Next Call Date</th> -->
                                        <th data-hide="phone">&nbsp;</th>
                                    </tr>
                                </thead>
                                <!--tbody section is required-->
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-2">
                            <table id="customer_table_inactive" class="table table-striped table-inverse">
                                <thead>
                                    <tr>
                                        <th data-class="expand">First Name</th>
                                        <th data-hide="phone">Last Name</th>
                                        <th data-hide="phone">Email</th>
                                        <th data-hide="phone">Phone</th>
                                        <th data-hide="phone">Last Call Date</th>
                                        <!-- <th data-hide="phone">Next Call Date</th> -->
                                        <th data-hide="phone">&nbsp;</th>
                                    </tr>
                                </thead>
                                <!--tbody section is required-->
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-3">
                            <table id="customer_table_do_not_call" class="table table-striped table-inverse">
                                <thead>
                                    <tr>
                                        <th data-class="expand">First Name</th>
                                        <th data-hide="phone">Last Name</th>
                                        <th data-hide="phone">Email</th>
                                        <th data-hide="phone">Phone</th>
                                        <th data-hide="phone">Last Call Date</th>
                                        <!-- <th data-hide="phone">Next Call Date</th> -->
                                        <th data-hide="phone">&nbsp;</th>
                                    </tr>
                                </thead>
                                <!--tbody section is required-->
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab6-4">
                            <table id="customer_table_all" class="table table-striped table-inverse">
                                <thead>
                                    <tr>
                                        <th data-class="expand">First Name</th>
                                        <th data-hide="phone">Last Name</th>
                                        <th data-hide="phone">Email</th>
                                        <th data-hide="phone">Phone</th>
                                        <th data-hide="phone">Last Call Date</th>
                                        <!-- <th data-hide="phone">Next Call Date</th> -->
                                        <th data-hide="phone">&nbsp;</th>
                                    </tr>
                                </thead>
                                <!--tbody section is required-->
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade mCompleteCall" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="panel panel-theme">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Complete Call</h3>
                        </div>
                        <div class="pull-right"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body no-padding">
                        <input type="hidden" id="iCustomerId" name="customer_id" value="">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center border-right">Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center border-right"><?= date('m/d/Y'); ?></td>
                                        <td><textarea name="customer_note" value="" id="iCustomerNote" class="form-control" rows="5" placeholder=""></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-theme" id="iSaveNote">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mNote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="panel panel-theme">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title"><span id="iCustomerName"></span> Contact History</h3>
                        </div>
                        <div class="pull-right"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body no-padding">
                        <div id="iMsg"></div>
                        <div id="iTableResponse" class="table-responsive">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<footer class="footer-content">
    
</footer> -->