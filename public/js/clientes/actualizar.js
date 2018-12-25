$('.editar').on('click',function(){
	var datosCiudad=jQuery.parseJSON($(this).attr("data-ciudad"));	
	var idEstado=datosCiudad.estado.idEstado;	
	
	getCliente($(this).val(), idEstado);	
	$(".modal-title").text("Editar Cliente");	
});


function getCliente(idCliente, idEstado) {			
	$("#estados").find(":selected").attr("selected",false);
	$("#estados option[value='"+idEstado+"']").attr("selected",true);	

	//AJAX (Checar version de jQuery)
	$.get("/Cliente/"+idCliente,function(data){		

		$('input[name=nombre]').val(data.nombre);
		$('input[name=correo]').val(data.correo);
		$('input[name=telefono]').val(data.telefono);		

		//Llenar ciudades **Metodo traido del otro archivo checar orden de llamados**
		getCiudades(idEstado,data.idCiudad);		

		
		$('input[name=direccion]').val(data.direccion);
		$('input[name=distancia]').val(data.distancia);
	});

	$("#frmAgregar").attr("action","/Cliente/actualizar/"+idCliente);
	$("#btnRegistrar").val("Actualizar");
	$("#btnRegistrar").removeClass("btn-success");
	$("#btnRegistrar").addClass("btn-info");
}

//Regresar nombre de ventana modal
$("#btnNuevo").on("click",function(){
	//Resetear combobox
	$("#estados").find(":selected").attr("selected",false);
	$("#estados option[value='1']").attr("selected",true);
	getCiudades(1);

	//Limpiar inputs si se presiono editar
	$("#frmAgregar")[0].reset();		
	
	$(".modal-title").text("Nuevo Cliente");
	$("#frmAgregar").attr("action","/Cliente/nuevo/add");
	$("#btnRegistrar").val("Agregar");

	$("#btnRegistrar").addClass("btn-success");
	$("#btnRegistrar").removeClass("btn-info");
});