/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var HistoryList = function ()  {

    return {
        init: function () {
            HistoryList.datatable();
        },

        datatable: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var expenseHistoryTable = $('#expense_history_table');

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
                            return $('#selectExpenseStatus').val();
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
                    $('#grandTotal').html('$' + json.grand_total);
                },
                footerCallback: function ( row, data, start, end, display ) {
                    // var api = this.api(), data;

                    // // Remove the formatting to get integer data for summation
                    // var intVal = function ( i ) {
                    //     return typeof i === 'string' ?
                    //         i.replace(/[\$,]/g, '')*1 :
                    //         typeof i === 'number' ?
                    //             i : 0;
                    // };

                    // // Total over all pages
                    // total = api
                    //     .column( 5 )
                    //     .data()
                    //     .reduce( function (a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0 );

                    // // Total over this page
                    // pageTotal = api
                    //     .column( 5, { page: 'current'} )
                    //     .data()
                    //     .reduce( function (a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0.00 );

                    // // Update footer
                    // $( api.column( 5 ).footer() ).html(
                    //     '$'+ pageTotal.toFixed(2)
                    // );
                },
            });

            // $('#categoryFilterId').on('change', function () {
            //     table.columns(1).search(this.value).draw();
            // });

            $('#selectExpenseStatus').on('change', function () {
                table.ajax.reload();
            });
        },

    };
} ();

HistoryList.init();
