<?php
// dd($data);
?>
<div class="header-content">
    <h2><i class="fa fa-group"></i>Resident Histories</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <table id="resident_history_all" class="table table-striped table-inverse dataTable">
              <thead>
                <tr>
                  <th data-class="expand">Name</th>
                  <th data-hide="phone">Phone</th>
                  <th data-hide="phone">Email</th>
                  <th data-hide="phone">&nbsp;</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

        </div>
    </div>

</div>

<div class="modal fade member_resident_histories" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-photo-viewer">
      <div class="modal-content">

        <div class="panel panel-theme">
            <div class="panel-heading">
                <div class="pull-left">
                    <h3 class="panel-title">Resident Histories</h3>
                </div>
                <div class="pull-right"></div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row table-responsive" id="iResidentHistoryTable"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-theme" type="button">Close</button>
        </div>
          
      </div>
  </div>
</div>