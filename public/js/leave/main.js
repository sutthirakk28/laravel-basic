$(document).ready(function() {
    var table = $('#leave').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

} );