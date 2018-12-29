/* Formatting function for row details - modify as you need */
function format (data) {
    // `d` is the original data object for the row
    
    return '<table class="table">'+
        '<tr class="table-primary">'+
            '<td>ID Transportista:</td>'+
            '<td>'+data.transportista.idTransportista+'</td>'+
        '</tr>'+
        '<tr class="table-primary">'+
            '<td>Transportista</td>'+
            '<td>'+data.transportista.transportista+'</td>'+
        '</tr>'+
        '<tr class="table-success">'+
            '<td>ID Operador:</td>'+
            '<td>'+data.operador.idOperador+'</td>'+
        '</tr>'+
        '<tr class="table-success">'+
            '<td>Nombre del operador</td>'+
            '<td>'+data.operador.nombre+" "+data.operador.apellido+'</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable();       
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        var idPlaca=row.data()[1];
        $.get('/TranPlacas/listarOperadoresTransportistas/'+idPlaca,function (data) {            
             if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(data)).show();
                tr.addClass('shown');
            }
        });
    });
} );