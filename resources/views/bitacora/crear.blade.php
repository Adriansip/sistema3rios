@extends('layouts.app');

@section('content')
@include('bitacora.errores.error')
<h1 class="text-center" id="titulo">Nueva Bitacora</h1>
<form action="/Bitacora/add" method="post" id="frmAgregar">
	@csrf
<div class="row">
	<div class="col-lg-6">		
			<label for="Estado">Cliente</label>			
	        <select class="form-control" name="idCliente" id="cliente">	        	
	        	<option value="">Seleccione una opcion</option>
	        	<option value="abrirRuta">Añadir nuevo cliente...</option>
	        	@foreach($clientes as $cliente)
	       		<option value="{{$cliente->idCliente}}" {{(old('cliente')==$cliente->idCliente)? 'selected':''}}>{{$cliente->nombre}}</option>
	       		@endforeach	       		
	        </select>    	        
	        <label for="NumeroEmbarque">Numero de Embarque</label>
			<input type="text" class="form-control" placeholder="Numero de embarque" name="noEmbarque" value="{{old('noEmbarque')}}" >    
			<label for="numeroTarimas">Numero de Tarimas</label>
			<input type="number" class="form-control" placeholder="Numero de tarimas" name="numeroTarimas" value="{{old('numeroTarimas')}}">
	</div>
	<div class="col-lg-6">
		<label for="kilosBrutos">Cantidad de Kilos Brutos</label>
		<input type="number" class="form-control" placeholder="Kg Brutos" name="kilosBrutos" value="{{old('kilosBrutos')}}">
		<label for="kilosNetos">Cantidad de Kilos Netos</label>
		<input type="number" class="form-control" placeholder="Kg Netos" name="kilosNetos" value="{{old('kilosNetos')}}"> 
	</div>
</div>
<hr>
<!--REGISTRAR-->
<input type="submit" value="Agregar" class="btn btn-success btn-block btn-lg" id="btnAgregar">
</form>

@include('cliente.modal.ventana')
<!--Recibir resultado-->
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>       
@endif

@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/estados-ciudades.js')}}"></script>
@if(isset($id))
<script src="{{asset('js/bitacora/editar.js')}}"></script>
@endif

	<script>
		$('#cliente').on('change',function () {			
			if($(this).val()==="abrirRuta"){
				$(this).attr("data-target","#ventana");
				$(this).attr("data-toggle","modal");
			}
		});
	</script>
@endsection
