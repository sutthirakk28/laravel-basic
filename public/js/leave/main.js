$(document).on("click", "#addDialog", function () {
     var myBookId = $(this).data('id');
     $("#depId").val( myBookId );
     console.log(myBookId);     
});
