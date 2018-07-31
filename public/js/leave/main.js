$(document).ready(function() {
    var table = $('#leave').DataTable( {
        responsive: true,
        "order": [[ 0, "desc" ]]
    } );

    new $.fn.dataTable.FixedHeader( table );

} );
