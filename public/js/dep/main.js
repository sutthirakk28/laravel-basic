$(document).ready(function() {
    var table = $('#dep').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );