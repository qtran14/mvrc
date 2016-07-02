<div class="header-content">
    <h2><i class="fa fa-file-o"></i>Customers</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Upload Stat</h3>
                    </div>
                    <div class="pull-right"></div>
                    <div class="clearfix"></div>
                </div><!-- /.panel-heading -->
                <div class="panel-body no-padding">
                    <?php
                        $upload_stat = Session::get('upload_stat');
                        Session::delete('upload_stat');
                    ?>
                    <ul class="list-group no-margin">
                        <li class="list-group-item list-group-item-success">New Added: <?= count($upload_stat['added']); ?></li>
                        <li class="list-group-item list-group-item-danger">Already Exist: <?= count($upload_stat['existed']); ?></li>
                    </ul>

                    <br />

                    <?php if ( count($upload_stat['existed']) > 0 ) { ?>
                        <table class="table table-striped table-danger">
                            <thead>
                                <tr><th>Already Exist</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach ( $upload_stat['existed'] as $name ) { ?>
                                <tr>
                                    <td><?= $name; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <br />
                    <a href="/customers" class="btn btn-danger">Back to Customer Main</a>
                </div><!-- /.panel-body -->
            </div>
        </div>
    </div>
    
