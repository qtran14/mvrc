/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var expense = function ()  {

    return {
        init: function () {
            expense.showReportDetail();
        },


        showReportDetail: function () {
            $('.cShowReprotDetailModal').on('click', function () {
                var params = '?';
                    params += 'report=' + $(this).data('report');
                    params += '&category=' + $(this).data('category');

                $.getJSON('/report/detail' + params, function (data) {
                    $('#iReportDetailTableBody').html(data.tr);
                    $('#iReportDetailTableFoot').html(data.tfoot);
                    expense.expenseInfo();
                });
            });

        },

        expenseInfo: function () {
            $('.cEditReportDetail').on('click', function () {
                var params = '?';
                    params += 'report=' + $(this).data('report');
                    params += '&expense=' + $(this).data('expense');
                    params += '&category=' + $(this).data('category');
                    params += '&expense_type=' + $('#iExpenseTypeHidden').val();

                $.getJSON('/report/expense_info' + params, function (data) {
                    $('#iReportDetailEditModalForm').html(data.form);

                    $('.chosen-select').chosen();
                    $('.datepicker-field-modal').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: false,
                        dataType: 'json',
                        encode: true,
                    });

                    $('#updateBtnId').on('click', function () {
                        var report = $('#iReportHiddenModalForm').val();
                        var category = $('#iCategoryHiddenModalForm').val();

                        $.ajax({
                            type: 'POST',
                            url: '/report/expsense_update',
                            data: $('#iEditExpensesReportDetailForm').serialize(),
                        })
                        .done(function (data) {
                            $('.cReportDetailEditModal').modal('hide');

                            var params = '?';
                                params += 'report=' + report;
                                params += '&category=' + category;

                            $.getJSON('/report/detail' + params, function (data) {
                                $('#iReportDetailTableBody').html(data.tr);
                                expense.expenseInfo();
                            });
                        })
                        .fail(function () {
                            alert("fail");
                        });

                        return false;
                    });
                });
            });
        },

    };
} ();

expense.init();
