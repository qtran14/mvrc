<?php

$htmlPageTitle = 'About Page';

$htmlPluginCSS = [
    '/assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap',
    '/assets/global/plugins/bower_components/datatables/css/datatables.responsive',
    '/assets/global/plugins/bower_components/flag-icon-css/css/flag-icon.min',
];

$htmlPluginJS = [
    '/assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min',
    '/assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap',
    '/assets/global/plugins/bower_components/datatables/js/datatables.responsive',
];

$htmlCustomJS = [
    '/assets/admin/js/pages/blankon.dashboard.investor',
];

renderView('pages/about');
?>
