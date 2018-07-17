$(document).ready(function() {
    var table = $('#pos').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   
} );


