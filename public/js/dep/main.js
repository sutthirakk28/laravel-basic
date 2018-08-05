$(document).on("click", ".addDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-footer #depId").val( myBookId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});

