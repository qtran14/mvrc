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


</body>
<!--/ END BODY -->

</html>
