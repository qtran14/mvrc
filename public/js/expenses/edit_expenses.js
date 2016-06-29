/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var EditExpenses = function ()  {

    return {
        init: function () {
            EditExpenses.jqueryValidation();
            EditExpenses.handleDropZone();
            EditExpenses.pullExpensePictures();
        },

        jqueryValidation: function () {
            $('#iEditExpensesForm').validate({
                rules: {
                    expense_date: {
                        required: true,
                        date: true,
                    },
                    expense_category:  {
                        required: true,
                        digits: true,
                    },
                    expense_name: {
                        required: true,
                    },
                    expense_total: {
                        required: true,
                        number: true,
                    },
                    expense_status: {
                        required: true,
                        digits: true,
                    },
                },
                messages: {
                    expense_date: 'Date is required.',
                    expense_category: 'Category is required.',
                    expense_name: 'Name is required.',
                    expense_total: 'Total is required.',
                    expense_status: 'Status is required.',
                },
                highlight:function(element) {
                    $(element).parents('.form-group').addClass('has-error has-feedback');
                },
                unhighlight: function(element) {
                    $(element).parents('.form-group').removeClass('has-error');
                },
//                submitHandler: function() {
//                    alert("submitted!");
//                },
            });
        },

        pullExpensePictures: function () {
            $.getJSON('/expenses/pull_images?id=' + $('#expenseHiddenId').val(), function (data) {
                $('#gallery').empty();

                $.each(data['images'], function(index, value) {
                    $('#gallery').append(value);
                });

                $('.gallery-img').on('click', function (event) {
                    event.preventDefault();
                    $('#imageAnchor').attr('src', $(this).data('source'));
                });
            });
        },

        handleDropZone: function () {
            Dropzone.options.expensePictureForm = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                complete: function(file) {
                    EditExpenses.pullExpensePictures();
                }
            };
        },

    };
} ();

EditExpenses.init();
