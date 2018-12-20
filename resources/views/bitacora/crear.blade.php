@extends('layouts.app');

@section('content')
<h1 class="text-center">Nueva Bitacora</h1>
<form action="/Bitacora/add" method="post">
	@csrf
<div class="row">
	<div class="col-lg-6">		
			<label for="Estado">Cliente</label>															
	        <select class="form-control" name="cliente" id="cliente">	        	
	        	<option value="">Seleccione una opcion</option>
	        	<option value="abrirRuta">Añadir nuevo cliente...</option>
	        	@foreach($clientes as $cliente)
	       		<option value="{{$cliente->idCliente}}">{{$cliente->nombre}}</option>
	       		@endforeach	       		
	        </select>    	        
	        <label for="NumeroEmbarque">Numero de Embarque</label>
			<input type="text" class="form-control" placeholder="Numero de embarque" name="noEmbarque">    
			<label for="numeroTarimas">Numero de Tarimas</label>
			<input type="number" class="form-control" placeholder="Numero de tarimas" name="numeroTarimas">
	</div>
	<div class="col-lg-6">
		<label for="kilosBrutos">Cantidad de Kilos Brutos</label>
		<input type="number" class="form-control" placeholder="Kg Brutos" name="kilosBrutos">
		<label for="kilosNetos">Cantidad de Kilos Netos</label>
		<input type="number" class="form-control" placeholder="Kg Netos" name="kilosNetos"> 
	</div>
</div>
<hr>
<!--REGISTRAR-->
<input type="submit" value="Agregar" class="btn btn-success btn-block btn-lg" >
</form>


<!--Recibir resultado-->
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>
            
@endif

@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$('#cliente').on('change',function () {			
			if($(this).val()==="abrirRuta"){
				window.open('/Cliente/nuevo');
			}
		});
	</script>
@endsection
