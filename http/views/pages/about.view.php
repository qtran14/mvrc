<div class="header-content">
    <h2><i class="fa fa-file-o"></i>About</h2>
<!--    <div class="breadcrumb-wrapper hidden-xs">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="dashboard.html">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Layouts</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Blank Page</li>
        </ol>
    </div>-->
</div>

<div class="body-content animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel rounded shadow panel-default">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Median Raised</h3>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-sm" data-action="refresh" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Refresh"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                        <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Start datatable -->
                    <table id="datatable-median-raised" class="table table-bordered table-condensed table-striped table-default">
                    <!--<table id="datatable-median-raised" class="table table-inverse">-->
                        <thead>
                        <tr>
                            <th data-class="expand">Series</th>
                            <th data-hide="phone"><span class="flag-icon flag-icon-us"></span> US</th>
                            <th data-hide="phone"><span class="flag-icon flag-icon-id"></span> Indonesian</th>
                            <th data-hide="phone"><span class="flag-icon flag-icon-fr"></span> France</th>
                            <th data-hide="phone,tablet"><span class="flag-icon flag-icon-de"></span> Germany</th>
                            <th data-hide="phone,tablet"><i class="fa fa-globe"></i> World</th>
                        </tr>
                        </thead>
                        <!--tbody section is required-->
                        <tbody></tbody>
                        <!--tfoot section is optional-->
                        <tfoot>
                        <tr>
                            <th>Series</th>
                            <th>US</th>
                            <th>UK</th>
                            <th>France</th>
                            <th>Germany</th>
                            <th>World</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--/ End datatable -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div>
    </div>
</div>
