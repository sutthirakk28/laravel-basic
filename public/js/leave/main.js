$(document).on("click", ".addDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-footer #depId").val( myBookId );
     console.log(myBookId);     
});


$( document ).ready(function() {

	$( ".addDialog" ).click(function() {
	  var myBookId = $(this).data('id');
	  $(".modal-footer #depId").val( myBookId );
	});

	$("#e_textshow").hide();
	$("#idper_chang").change(function(){
		$("#e_textshow").show();
		var id = $(this).val();
		$("#textshow").val(id);

		console.log($("#textshow").val());
	});
});