$('#estados').on('change',function(){
	getCiudades($(this).val());
});


$('.editar').on('click',function(){
	getEstatus($(this).val());
	$(".modal-title").text("Editar Estatus");
});


$("#btnAgregar").on("click",function(){
	//Obtener idBitacora
	var idBitacora=$("#bitacora").attr("data-id");

	//Proteger noTransito
	$('input[name=noTransito]').attr("readonly",true);

	//Resetear combobox
	$("#estados").find(":selected").attr("selected",false);
	$("#estados option[value='1']").attr("selected",true);
	getCiudades(1);

	//Limpiar inputs si se presiono editar
	$("#frmAgregar")[0].reset();		
	$('textarea[name=otro]').text("");
	$("#observaciones").find(":selected").attr("selected",false);
	
	$(".modal-title").text("Nuevo Estatus");
	$("#frmAgregar").attr("action","/Estatus/create/"+idBitacora);
	$("#btnRegistrar").val("Agregar");

	$("#btnRegistrar").addClass("btn-success");
	$("#btnRegistrar").removeClass("btn-info");
});

function getEstatus(idEstatus, ciudad) {			
	$('input[name=noTransito]').removeAttr("readonly");	

	//AJAX (Checar version de jQuery)
	$.get("/Estatus/listar/"+idEstatus,function(data){				
		//console.log(data);
		$('input[name=noTransito]').val(data.estatus.noTransito);
		$('input[name=fecha]').val(data.estatus.fecha);
		$('input[name=hora]').val(data.estatus.hora);
		
		$("#estados").find(":selected").attr("selected",false);
		$("#estados option[value='"+data.idEstado+"']").attr("selected",true);
		getCiudades(data.idEstado,data.idCiudad);

		$("#observaciones").find(":selected").attr("selected",false);
		$("#observaciones option[value='"+data.estatus.idObservacion+"']").attr("selected",true);

		//Llenar otro		
		if(data.estatus.otro!=null){
			$('textarea[name=otro]').html(data.estatus.otro);
		}else{
			$('textarea[name=otro]').html(null);
		}

		if(data.estatus.entregado!=null){
			$('input[name=entregado]').attr("checked","true");
		}else{
			$('input[name=entregado]').removeAttr("checked");
		}

	});


	$('#frmAgregar').attr('action','/Estatus/actualizar/'+idEstatus);
	$("#btnRegistrar").val("Actualizar");
	$("#btnRegistrar").removeClass("btn-success");
	$("#btnRegistrar").addClass("btn-info");
}