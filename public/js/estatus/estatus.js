$('.editar').on('click',editar);

function editar() {
	$idEstatus=$(this).val();
	$ciudad=$('#ciudades').val();
//	console.log("Ciudad "+$ciudad);
	//AJAX (Checar version de jQuery)
	$.get("/Estatus/listar/"+$idEstatus,function(data){		
		
		$('input[name=noTransito]').val(data.noTransito);

		$('#estadoActual').val(data.ciudad.estado.idEstado);
		$('#estadoActual').html(data.ciudad.estado.estado);

		$('#ciudades').empty();		
		$('#ciudades').append("<option value='' id='ciudadActual'> </option>");
		$('#ciudadActual').val(data.ciudad.idCiudad);
		$('#ciudadActual').html(data.ciudad.ciudad);
	});
}