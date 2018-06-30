$(document).ready(function(){
	$('.addComment').click(function(){
		var id = $(this).attr('data-id');
		$('#id_comment').val(id);
		$('.modal').modal('show');
	});
});