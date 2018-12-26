//Obtener el id de la URL

var idBitacora=window.location.pathname.split("/")[3];
$("#titulo").text("Editar Bitacora");
$("#frmAgregar").attr("action","/Bitacora/actualizar/"+idBitacora);
$("#btnAgregar").removeClass("btn-success");
$("#btnAgregar").addClass("btn-info");
$("#btnAgregar").val("Actualizar");


$.get("/Bitacora/listar/"+idBitacora,function (data) {
	console.log(data);

	$("#cliente option[value='"+data.idCliente+"']").attr("selected",true);
	$("input[name=noEmbarque]").val(data.noEmbarque);
	$("input[name=numeroTarimas]").val(data.numeroTarimas);
	$("input[name=kilosBrutos]").val(data.kilosBrutos);
	$("input[name=kilosNetos").val(data.kilosNetos);
});