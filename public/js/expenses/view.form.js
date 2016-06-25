/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var ViewForm = function ()  {
    
    return {
        init: function () {
//            $.validator.setDefaults({ ignore: ":hidden:not(select)" });
            $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
            
            ViewForm.chosenSelect();
            ViewForm.updateStatus();
        },
        
        chosenSelect: function () {
            $('.chosen-select').chosen();
        },
        
        updateStatus: function () {
            $('#updateStatus-id').on('click', function () {
                var statusId = $('#statusSelect-id').val();
                var expenseId = $('#expense_id-id').val();
                
                $.ajax({
                    url: '/expenses/update-status/'+ expenseId + '/'+ statusId,
                    success: function (result) {
                        if ( $.trim(result) === 'success' ) {
                            window.location.href = '/expenses';
                        }
                        else {
                            swal("Please select new Update Status");
                        }
                    },
                });
            });
        }
    };
} ();

ViewForm.init();