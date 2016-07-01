/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var Index = function ()  {

    return {
        init: function () {
            Index.customerDatatable();
        },

        customerDatatable: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var tableElement = $('#customer_table');
            var table = tableElement.DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                Paginate: false,
                paging: true,
                "pageLength": 20,
                lengthMenu: [[10, 15, 20, 25, 50, 100, 500, -1], [10, 15, 20, 25, 50, 100, 500, 'All']],
                order: [[ 4, "asc" ]],
                columnDefs: [
                    // { orderable: false, targets: 0 },
                    // { orderable: false, targets: 4 },
                    // { orderable: false, targets: 6 },
                    { orderable: false, targets: 5 },
//                    { "targets": 6, "visible": false, "searchable": false },
                ],

                ajax: {
                    url: '/customers/all',
                    data: {
                        // status: function () {
                        //     return $('#selectExpenseStatus').val();
                        // }
                    }
                },


                preDrawCallback: function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelperAjax) {
                        responsiveHelperAjax = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
                    }
                },
                rowCallback: function (nRow) {
                    responsiveHelperAjax.createExpandIcon(nRow);
                },
                drawCallback: function (oSettings) {
                    responsiveHelperAjax.respond();

                    $('.markAsCalledBtn').on('click', function () {
                        $.getJSON('/customers/update?customer_id=' + $(this).data('customer_id'), function () {
                            window.location = '/customers';
                        });
                    });

                    // var json = table.ajax.json();
                    // $('#grandTotal').html('$' + json.grand_total);
                },
            });
        },

    };
} ();

Index.init();
