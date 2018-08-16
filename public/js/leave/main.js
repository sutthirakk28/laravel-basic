$(document).on("click", "#addDialog", function () {
     var myBookId = $(this).data('id');
     $("#depId").val( myBookId );
     console.log(myBookId);     
});

$(document).ready(function(){
  $('#id_per').change(function(){

    if($(this).val() !=''){
      
      var value = $(this).val();

      var _token = $('input[name="_token"]').val();
      console.log(value);

      $.ajax({
        url:"{{ route('fetch') }}",
        method:"POST",
        data:{'id':value, _token:_token},
        success:function(data1){
          $('#id_person').html(data1);
          console.log(data1);
        }
      })
    }
  });

});