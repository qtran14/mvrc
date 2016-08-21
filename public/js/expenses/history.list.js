/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var HistoryList = function ()  {

    return {
        init: function () {
            HistoryList.datatableCancelled();
            HistoryList.datatableCompleted();
            HistoryList.datatableVerified();
            HistoryList.datatableNew();
            HistoryList.datatableAll();
        },

        datatableCancelled: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_cancelled');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 1, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/expenses/history',
                    data: {
                        status: function () {
                            return 4;
                        }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(expenseHistoryTable, breakpointDefinition);
                    }
                },
                rowCallback    : function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback   : function (oSettings) {
                    responsiveHelperAjax.respond();

                    var json = table.ajax.json();
                    $('#iGrandTotalCancelled').html('$' + json.grand_total);

                    $('.zoom-images').elevateZoom();
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

        datatableCompleted: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_completed');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 1, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/expenses/history',
                    data: {
                        status: function () {
                            return 3;
                        }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(expenseHistoryTable, breakpointDefinition);
                    }
                },
                rowCallback    : function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback   : function (oSettings) {
                    responsiveHelperAjax.respond();

                    var json = table.ajax.json();
                    $('#iGrandTotalCompleted').html('$' + json.grand_total);

                    $('.zoom-images').elevateZoom();
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

        datatableVerified: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_verified');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 1, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/expenses/history',
                    data: {
                        status: function () {
                            return 2;
                        }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(expenseHistoryTable, breakpointDefinition);
                    }
                },
                rowCallback    : function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback   : function (oSettings) {
                    responsiveHelperAjax.respond();

                    var json = table.ajax.json();
                    $('#iGrandTotalVerified').html('$' + json.grand_total);

                    $('.zoom-images').elevateZoom();
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

        datatableNew: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_new');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 1, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/expenses/history',
                    data: {
                        status: function () {
                            return 1;
                        }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(expenseHistoryTable, breakpointDefinition);
                    }
                },
                rowCallback    : function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback   : function (oSettings) {
                    responsiveHelperAjax.respond();

                    var json = table.ajax.json();
                    $('#iGrandTotalNew').html('$' + json.grand_total);

                    $('.zoom-images').elevateZoom();
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

        datatableAll: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_all');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 1, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/expenses/history',
                    data: {
                        status: function () {
                            return 0;
                        }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(expenseHistoryTable, breakpointDefinition);
                    }
                },
                rowCallback    : function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback   : function (oSettings) {
                    responsiveHelperAjax.respond();

                    var json = table.ajax.json();
                    $('#iGrandTotalAll').html('$' + json.grand_total);

                    $('.zoom-images').elevateZoom();
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

    };
} ();

HistoryList.init();
