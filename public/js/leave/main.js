$(document).on("click", "#addDialog", function () {
     var myBookId = $(this).data('id');
     $("#depId").val( myBookId );
     console.log(myBookId);     
});

  $("select[name='id_per']").change(function(){
      var id_country = $(this).val();
      var token = $("input[name='_token']").val();
      console.log(id_country);
      $.ajax({
          url: "<?php echo route('leave/select-ajax') ?>",
          method: 'POST',
          data: {id:id_country, _token:token},
          success: function(data) {
            $("select[name='id_state'").html('');
            $("select[name='id_state'").html(data.options);
            console.log(id_country);
          }
      });
  });
