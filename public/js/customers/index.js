/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var Index = function ()  {

    return {
        init: function () {
            Index.modalSave();
            Index.customerDatatableActive();
            Index.customerDatatableInactive();
            Index.customerDatatableDoNotCall();
            Index.customerDatatableAll();
        },

        modalSave: function () {
            $('#iSaveNote').on('click', function () {
                var params = '';
                    params += '?customer_id=' + $('#iCustomerId').val();
                    params += '&customer_note=' + $('#iCustomerNote').val();

                $.getJSON('/customers/update' + params, function () {
                    window.location = '/customers';
                });
            });
        },

        customerDatatableActive: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var tableElement = $('#customer_table_active');
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
                        status: function () {
                            return 1;
                        }
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
                        $('#iCustomerId').val($(this).data('customer_id'));
                    });

                    $('.cNote').on('click', function () {
                        var params = '';
                            params += '?customer_id=' + $(this).data('customer_id');

                        $.getJSON('/customers/note' + params, function (data) {
                            if ( data.error == 1 ) {
                                $('#iMsg').html(data.msg);
                                $('#iTableResponse').empty();
                                $('#iCustomerName').empty();
                            }
                            else {
                                $('#iMsg').empty();
                                $('#iCustomerName').html(data.customer_name);
                                $('#iTableResponse').html(data.table_note);
                            }
                        });
                    });
                },
            });
        },

        customerDatatableInactive: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var tableElement = $('#customer_table_inactive');
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
                        status: function () {
                            return 2;
                        }
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
                        $('#iCustomerId').val($(this).data('customer_id'));
                    });

                    $('.cNote').on('click', function () {
                        var params = '';
                            params += '?customer_id=' + $(this).data('customer_id');

                        $.getJSON('/customers/note' + params, function (data) {
                            if ( data.error == 1 ) {
                                $('#iMsg').html(data.msg);
                                $('#iTableResponse').empty();
                                $('#iCustomerName').empty();
                            }
                            else {
                                $('#iMsg').empty();
                                $('#iCustomerName').html(data.customer_name);
                                $('#iTableResponse').html(data.table_note);
                            }
                        });
                    });
                },
            });
        },

        customerDatatableDoNotCall: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var tableElement = $('#customer_table_do_not_call');
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
                        status: function () {
                            return 3;
                        }
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
                        $('#iCustomerId').val($(this).data('customer_id'));
                    });

                    $('.cNote').on('click', function () {
                        var params = '';
                            params += '?customer_id=' + $(this).data('customer_id');

                        $.getJSON('/customers/note' + params, function (data) {
                            if ( data.error == 1 ) {
                                $('#iMsg').html(data.msg);
                                $('#iTableResponse').empty();
                                $('#iCustomerName').empty();
                            }
                            else {
                                $('#iMsg').empty();
                                $('#iCustomerName').html(data.customer_name);
                                $('#iTableResponse').html(data.table_note);
                            }
                        });
                    });
                },
            });
        },

        customerDatatableAll: function () {
            var responsiveHelperAjax = undefined;
            var responsiveHelperDom = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone : 480
            };

            var tableElement = $('#customer_table_all');
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
                        status: function () {
                            return 0;
                        }
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
                        $('#iCustomerId').val($(this).data('customer_id'));
                    });

                    $('.cNote').on('click', function () {
                        var params = '';
                            params += '?customer_id=' + $(this).data('customer_id');

                        $.getJSON('/customers/note' + params, function (data) {
                            if ( data.error == 1 ) {
                                $('#iMsg').html(data.msg);
                                $('#iTableResponse').empty();
                                $('#iCustomerName').empty();
                            }
                            else {
                                $('#iMsg').empty();
                                $('#iCustomerName').html(data.customer_name);
                                $('#iTableResponse').html(data.table_note);
                            }
                        });
                    });
                },
            });
        },

    };
} ();

Index.init();
