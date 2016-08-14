/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var ResidentHistory = function ()  {

    return {
        init: function () {
            ResidentHistory.datatableMembers()
        },

        datatableMembers: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#resident_history_all');

            var table = expenseHistoryTable.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, targets: 3 },
                    // { orderable: false, targets: 4 },
                    // { orderable: false, targets: 6 },
                    // { orderable: false, targets: 7 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],



                ajax: {
                    url: '/resident_histories/members',
                    // data: {
                    //     status: function () {
                    //         return 4;
                    //     }
                    // }
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

                    $('.view_info').each(function () {
                        $(this).on('click', function () {
                            // alert("member id: " + $(this).data('member_id'));
                            $.getJSON('resident_histories/member_details?member_id=' + $(this).data('member_id'), function (data) {
                                $('#iResidentHistoryTable').html(data.table);
                            });
                        });
                    });

                },
                footerCallback: function ( row, data, start, end, display ) {
                },
            });
        },


    };
} ();

ResidentHistory.init();
