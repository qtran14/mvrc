/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var Index = function ()  {

    return {
        init: function () {
            Index.datatableAll();
        },

        datatableAll: function () {
            // var responsiveHelperAjax = undefined;
            // var responsiveHelperDom = undefined;
            // var breakpointDefinition = {
            //     tablet: 1024,
            //     phone : 480
            // };

            var target_table = $('#iTestDatatable');

            var table = target_table.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 2,
                lengthMenu: [[2, 10, 15, 20, 25, 50, 100, 500, -1], [2, 10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 0, "desc" ]],
                columnDefs: [
                    // { orderable: false, targets: 0 },
                    // { orderable: false, targets: 4 },
                    // { orderable: false, targets: 6 },
                    // { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/datatable/test.index',
                    // data: {
                    //     status: function () {
                    //         return 0;
                    //     }
                    // }
                },


                preDrawCallback: function () {
                    
                },
                rowCallback    : function (nRow) {
                    
                },
                drawCallback   : function (oSettings) {
                    
                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },

    };
} ();

Index.init();
