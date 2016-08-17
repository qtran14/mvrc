</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->

</section><!-- /#wrapper -->
<!--/ END WRAPPER -->

<!-- START @BACK TOP -->
<div id="back-top" class="animated pulse circle">
<i class="fa fa-angle-up"></i>
</div><!-- /#back-top -->
<!--/ END BACK TOP -->

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- START @CORE PLUGINS -->
<script src="/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
<script src="/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js"></script>
<script src="/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js"></script>
<script src="/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/global/plugins/bower_components/jquery.sparkline.min/index.js"></script>
<script src="/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
<script src="/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
<script src="/assets/global/plugins/bower_components/bootbox/bootbox.js"></script>
<script src="/assets/global/plugins/bower_components/chosen_v1.2.0/chosen.jquery.js"></script>
<script src="/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
<script src="/assets/global/plugins/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--/ END CORE PLUGINS -->

<!-- START @PAGE LEVEL PLUGINS -->
<?php
    if ( ! empty($htmlPluginJS) ) {
        foreach ( $htmlPluginJS as $jsFile ) {
            echo '<script src="'. $jsFile .'.js"></script>';
        }
    }
?>
<!--/ END PAGE LEVEL PLUGINS -->

<!-- START @PAGE LEVEL SCRIPTS -->
<script src="/assets/admin/js/apps.js"></script>
<!--        <script src="/assets/admin/js/blankon.dashboard.js"></script>
<script src="/assets/admin/js/demo.js"></script>-->

<?php
    if ( ! empty($htmlCustomJS) ) {
        foreach ( $htmlCustomJS as $jsFile ) {
            echo '<script src="'. $jsFile .'.js"></script>';
        }
    }
?>
<!--/ END PAGE LEVEL SCRIPTS -->
<!--/ END JAVASCRIPT SECTION -->

<script>
$(document).ready(function () {
    $('#iQuickNotAnchor').on('click', function () {
        $.getJSON('/quick_notes/main', function (data) {
            $('#iQuickNoteTable tbody').empty();
            $('#iQuickNoteTable tbody').append(data.tr);

            $('.cQuickNoteDelete').on('click', function () {
                var quick_note_id = $(this).data('quick_note_id');
                $('#row_' + quick_note_id).remove();

                $.getJSON('/quick_notes/delete?id=' + quick_note_id, function (data) {});
            });
        });
    });

    $('#iQuickNoteSubmit').on('click', function () {
        var quick_note = $.trim($('#iQuickNote').val());

        if ( quick_note.length > 0 ) {
            $('#iQuickNote').val('');

            $.getJSON('/quick_notes/save?quick_note=' + quick_note, function (data) {
                $('#iQuickNoteTable tbody').empty();
                $('#iQuickNoteTable tbody').append(data.tr);

                $('.cQuickNoteDelete').on('click', function () {
                    var quick_note_id = $(this).data('quick_note_id');
                    $('#row_' + quick_note_id).remove();

                    $.getJSON('/quick_notes/delete?id=' + quick_note_id, function (data) {});
                });
            });
        }
        else {
            alert('Please provide note');
        }
    });
});

</script>

<div class="modal fade top_modal_notes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="panel panel-theme">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">My Notes</h3>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-sm" data-dismiss="modal" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea name="quick_note" id="iQuickNote" class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <span id="iQuickNoteSubmit" class="col-sm-3 btn btn-theme">Submit</span>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="iQuickNoteTable" class="table table-striped table-inverse">
                                    <thead>
                                        <tr>
                                            <th style="width: 200px;" class="text-center border-top">Date</th>
                                            <th class="border-top">Note</th>
                                            <th style="width: 100px;" class="border-top">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>


<div class="modal fade launch-modal-photo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-photo-viewer">
      <div class="modal-content">
          <div class="row">

              <div class="col-md-12 col-sm-12 modal-photo-left">
                  <div class="modal-photo">
                      <img id="imageAnchor" src="" class="photo img-responsive" alt="...">
                  </div>
              </div>

          </div>
      </div>
  </div>
</div>


<div class="modal fade member_resident_histories" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="panel panel-theme">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Resident Histories</h3>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-sm" data-dismiss="modal" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="iQuickNoteTable" class="table table-striped table-inverse">
                                    <thead>
                                        <tr>
                                            <th>Landlord</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Zip Code</th>
                                        </tr>
                                    </thead>
                                    <tbody id="iResidentHistoryTable">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</body>
<!--/ END BODY -->

</html>
