$(document).ready(function(){
	getCiudades(1);	
});

$('#estados').on('change',function(){
	getCiudades($(this).val());	
});


function getCiudades($id_estado,idCiudadSelected) {			
	//AJAX (Checar version de jQuery)
	$.get("/Ciudades/"+$id_estado,function(data){		
		$('#ciudades').empty();		
		$('#ciudades').append('<option value="">Seleccione un municipio</option>');				
		var texto="";

 		for (var i = 0; i < data.length; i++) { 
 			if(data[i].idCiudad==idCiudadSelected){
 				texto='<option selected value="'+data[i].idCiudad+'">'+data[i].ciudad+'</option>'
 			}else{
 				texto='<option value="'+data[i].idCiudad+'">'+data[i].ciudad+'</option>'
 			}

 			$('#ciudades').append(texto);
 		}
	});	
}

