@extends('layouts.app');

@section('content')	
<br>
<div class="card">		
		<div class="card-header">
			<h1 class="text-center">Rastreo de embarques</h1>
		</div>		
		<div class="card-body">							
			<form action="/Estatus/mostrar" method="post" class="offset-lg-2 col-lg-8">
				<h3 class="text-center">Busqueda por cliente</h3>
				@csrf
				<select class="form-control" name="cliente" id="cliente">
					<option value="">Seleccione una opcion</option>
					@foreach($clientes as $cliente)
						<option value="{{$cliente->idCliente}}">{{$cliente->nombre}}  ({{$cliente->ciudad->ciudad}})</option>
					@endforeach
				</select>
				<h3 class="text-center">Busqueda por orden de embarque</h3>
				<input type="text" class="form-control" name="noEmbarque">
			<!--	<hr> OPCIONAL
				<h3 class="text-center">Busqueda por lugar de destino</h3>				
				<label for="Estado">Estado</label>
				<select name="estado" id="estados" class="form-control">
					@foreach($estados as $estado)
						<option value="{{$estado->idEstado}}">{{$estado->estado}}</option>
					@endforeach
				</select>
				<label for="Ciudad">Ciudad</label>
				<select name="idCiudad" id="ciudades" class="form-control">
					@foreach($estados[0]->ciudades as $ciudad)
						<option value="{{$ciudad->idCiudad}}">{{$ciudad->ciudad}}</option>
					@endforeach
				</select> -->
				<br>
				<input type="submit" value="Buscar" class="btn btn-success form-control" >		
		</form>
		</div>
		@if(Session::has('message'))
		<div class="card-footer">
     		<div class="alert alert-{{Session::get('class')}} alert-dismissable">
     		<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>      
     	</div>	
		@endif
</div>		
@endsection

@section('scripts')	
	<script src="{{asset('js/estados-ciudades.js')}}"></script>
@endsection