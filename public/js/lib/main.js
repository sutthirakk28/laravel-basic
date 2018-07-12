$(document).ready(function() {
    var table = $('#lib').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );