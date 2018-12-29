/* Formatting function for row details - modify as you need */
function format (data) {
    // `d` is the original data object for the row
    
    var html="";
    for (var i = 0; i < data.length; i++) {
        html+='<table class="table">'+
        '<tr class="table-primary">'+
            '<td>ID Placa</td>'+
            '<td>'+data[i].placa.idPlaca+'</td>'+
        '</tr>'+
        '<tr class="table-primary">'+
            '<td>Placa</td>'+
            '<td>'+data[i].placa.noPlaca+'</td>'+
        '</tr>'+
        '<tr class="table-primary">'+
            '<td>Tipo de Unidad</td>'+
            '<td>'+data[i].tipoUnidad.tipoUnidad+'</td>'+
        '</tr>'       
    '</table>';
        }
    return html;
     
}
 
$(document).ready(function() {
    var table = $('#tblTransportistas').DataTable();       
     
    // Add event listener for opening and closing details
    $('#tblTransportistas tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        var idTransportista=row.data()[1];
        $.get('/TranPlacas/listarPlacas/'+idTransportista,function (data) {            
            console.log(data);
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