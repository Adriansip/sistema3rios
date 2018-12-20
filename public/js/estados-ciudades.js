$('#estados').on('change',function(){
	getCiudades($(this).val(),'','');
});

$('#estados2').on('change',function(){
	getCiudades($(this).val(),'2');
});

function getCiudades($id_estado,boton,ciudad) {		
	//AJAX (Checar version de jQuery)
	$.get("/Ciudades/"+$id_estado,function(data){
		var opciones="";
		$('#ciudades'+boton).empty();
		if(boton!=2){
			$('#ciudades'+boton).append(opciones='<option value="">Seleccione un municipio</option>');
		}else{
			if(ciudad!=null)
				$('#ciudades'+boton).append(opciones='<option value="'+ciudad[0]+'" id="ciudadActual">'+ciudad[1]+'</option>');
		}
 			for (var i = 0; i < data.length; i++) {
 				$('#ciudades'+boton).append('<option value="'+data[i].idCiudad+'">'+data[i].ciudad+'</option>');
 				//Llenar select
 			}
	});
}


$('.editar').on('click',editar);

function editar() {
	$idEstatus=$(this).val();

	$('#formActualizar').attr('action','/Estatus/actualizar/'+$idEstatus);

	$('input[name=_noTransito]').removeAttr("readonly");

	$ciudad=$('#ciudades2').val();
	//	console.log("Ciudad "+$ciudad);
	//AJAX (Checar version de jQuery)
	$.get("/Estatus/listar/"+$idEstatus,function(data){				
		console.log(data);
		$('input[name=_noTransito]').val(data.noTransito);
		$('input[name=_fecha]').val(data.estatus.fecha);
		$('input[name=_hora]').val(data.estatus.hora);
		
		//Llenar y mostrar estado actual
		$('#estadoActual').val(data.ciudad.estado.idEstado);
		$id_estado=$('#estadoActual').val();
		$('#estadoActual').html(data.ciudad.estado.estado);
		
		//Llenar ciudades y mostrar actual
		var ciudad=[data.ciudad.idCiudad, data.ciudad.ciudad];
		getCiudades($id_estado,'2',ciudad);

		//Llenar observaciones
		$('#observacionActual').val(data.estatus.idObservacion);
		$id_estado=$('#estadoActual').val();
		$('#observacionActual').html(data.observacion);
				

		//Llenar otro		
		if(data.otro!=null){
			$('#textarea').html(data.otro);
		}else{
			$('#textarea').html(null);
		}

		if(data.entregado!=null){
			$('#entregado2').attr("checked","true");
		}else{
			$('#entregado2').removeAttr("checked");
		}

	});
}
