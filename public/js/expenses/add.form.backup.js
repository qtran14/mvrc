/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var AddForm = function ()  {

    return {
        init: function () {
//            $.validator.setDefaults({ ignore: ":hidden:not(select)" });
            $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });

            AddForm.bootstrapDatepicker();
            AddForm.chosenSelect();
            AddForm.jqueryValidation();
            AddForm.dropzoneImage();
            AddForm.removeImages();
        },

        bootstrapDatepicker: function () {
            $('#inputDate').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true,
            });
        },

        chosenSelect: function () {
            $('.chosen-select').chosen();
        },

        jqueryValidation: function () {
            $('#addExpenseForm').validate({
                rules: {
                    expense_date: {
                        required: true
                    },
                    category_select:  {
                        required: true
                    },
                    expense_name: {
                        required: true
                    },
                },
                messages: {
                    expense_date: 'Please enter expense date!',
                    category_select: 'Please select expense category!',
                    expense_name: 'Please provide an expense name!',
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

        dropzoneImage: function () {
            var myDropzone = new Dropzone("#my-dropzone", {
                maxFilesize: 5,
                parallelUploads: 10,
                maxFiles: 10,
                paramName: "image",
                acceptedFiles: "image/jpeg,image/png,image/gif",
                url: '/expenses/upload-image',
                dictDefaultMessage: 'Drop images to upload',

                success: function (file, response) {
                    var response = response.trim();
                    var dotPos = response.indexOf('.');
                    var image = '<div style="margin-bottom: 20px" id="'+ response.substring(0, dotPos) +'" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                            image += '<div  style="vertical-align: bottom; min-height: 80px;">';
                                image += '<img style="padding-right: 10px;" data-dz-thumbnail="" src="/app_acs/'+ userAccount +'/images/expenses/thumbnail/'+ response +'" />';
                            image += '</div>';
                            image += '<span data-image_name="'+ response +'" class="btn btn-danger remove-images">Remove</span>';
                        image += '</div>';

                    $('#thumbnail-preview').append(image);
                    AddForm.removeImages();
                }
            });
        },

        removeImages: function () {
            $('.remove-images').each(function () {
                $(this).on('click', function () {
                    var removeImage = $(this).data('image_name');

                    $.ajax({
                        url: '/expenses/remove-image/' + removeImage,
                        success: function (result) {
                            console.log(result);

                            if ($.trim(result) === 'success') {
                                var dotPos = removeImage.indexOf('.');
                                var extractId = removeImage.substring(0, dotPos);
                                var removeElement = '#' + extractId.trim();
                                $(removeElement).remove();
                            }
                            else {
                                swal("Invalid request");
                            }
                        }
                    });
                });
            });
        }
    };
} ();

userAccount = $('#user-account-id').val();
Dropzone.autoDiscover = false;
AddForm.init();
