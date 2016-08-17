<div class="header-content">
    <h2><i class="fa fa-dollar"></i>Expenses</h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload Form</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="/upload_templates/expenses/add_expenses.csv" class="btn btn-lilac">Download template...</a>
                        </div>
                        <div class="col-md-6 text-right"></div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="/expenses/store_upload" enctype="multipart/form-data" id="expenseUploadForm" class="form-horizontal mt-10">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">File Upload</label>
                                        <div class="col-sm-7">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-append">
                                                    <div class="uneditable-input">
                                                        <i class="glyphicon glyphicon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-success btn-file btn-sm">
                                                        <span class="fileupload-new">Upload</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file" name="expense_file" id="expenseFile" />
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists btn-sm" data-dismiss="fileupload">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" name="upload" value="1" id="uploadBtn" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div style="margin-top: -1px;" class="table-responsive">
                                <table class="table table-striped table-theme">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;" class="text-center border-right">Category ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $data['expense_category_list'] as $key => $name ) { ?>
                                            <tr>
                                                <td class="text-center border-right"><?= $key; ?></td>
                                                <td><?= $name; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="col-md-6"></div>
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
