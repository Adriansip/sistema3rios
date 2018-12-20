$('#estados').on('change',getCiudades);

function getCiudades() {
	$id_estado=$(this).val();

	//AJAX (Checar version de jQuery)
	$.get("/Ciudades/"+$id_estado,function(data){
		var opciones='<option value="">Seleccione un municipio</option>';
 			for (var i = 0; i < data.length; i++) {
 				opciones+= '<option value="'+data[i].idCiudad+'">'+data[i].ciudad+'</option>';

 				//Llenar select
 				$('#ciudades').html(opciones);
 			}
	});
}