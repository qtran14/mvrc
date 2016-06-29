/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var AddForm = function ()  {

    return {
        init: function () {
            $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });

            AddForm.jqueryValidation();
        },

        jqueryValidation: function () {
            $('#addExpensesForm').validate({
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
                },
                messages: {
                    expense_date: 'Date is required.',
                    expense_category: 'Category is required.',
                    expense_name: 'Name is required.',
                    expense_total: 'Total is required.',
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

    };
} ();

AddForm.init();
