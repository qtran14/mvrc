<?php
$htmlPageTitle = 'Gallery';

$htmlPluginCSS = [
    '/assets/global/plugins/bower_components/fancybox/source/jquery.fancybox.css?v=2.1.5',
    '/assets/global/plugins/bower_components/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5',
    '/assets/global/plugins/bower_components/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7',
];

$htmlPluginJS = [
    '/assets/global/plugins/bower_components/fancybox/source/jquery.fancybox.pack.js?v=2.1.5',
    '/assets/global/plugins/bower_components/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5',
    '/assets/global/plugins/bower_components/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6',
    '/assets/global/plugins/bower_components/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7',
];

$htmlCustomJS = [
    '/assets/admin/js/pages/gallery',
];


$data['images'] = (new Galleries)->photo();

$layoutPath     = 'gallery';
renderView('pages/gallery');
?>
