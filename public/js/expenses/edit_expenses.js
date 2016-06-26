/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var EditExpenses = function ()  {

    return {
        init: function () {
            EditExpenses.handleDropZone();
            EditExpenses.pullExpensePictures();
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
