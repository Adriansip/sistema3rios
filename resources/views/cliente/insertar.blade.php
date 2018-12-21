@extends('layouts.app');

@section('content')
<h1 class="text-center">Nuevo cliente</h1>			
<form action="/Cliente/nuevo/add" method="post">     
{{csrf_field()}}   
<div class="row">                   
	<div class="col-lg-6">
		<label for="Nombre">Nombre del cliente</label>
		<input type="text" class="form-control" placeholder="Nombre del cliente" name="nombre" value="{{old('nombre')}}">
		<label for="Email">Correo de contacto</label>
		<input type="email" class="form-control" placeholder="Correo electronico" name="correo" value="{{old('correo')}}">
				
		<label for="Telefono">Telefono de contacto</label>
		<input type="number" class="form-control" placeholder="Telefono" name="telefono" value="{{old('telefono')}}">	
	</div>
	<div class="col-lg-6">
		<label for="Estado">Estado</label>
		<select class="form-control" name="estado" id="estados">
			@foreach($estados as $estado)
			<option value="{{$estado->idEstado}}">{{$estado->estado}}</option>
			@endforeach
		</select>
		<label for="Ciudad">Ciudad</label>
		<select class="form-control" name="idCiudad" id="ciudades">
            @foreach($ciudades as $ciudad)
			<option value="{{$ciudad->idCiudad}}">{{$ciudad->ciudad}}</option>
			@endforeach
		</select>
		<label for="Direccion">Direccion</label>
		<input type="text" class="form-control" placeholder="Calle, Mz, Lt, Colonia" name="direccion" value="{{old('direccion')}}">

		<label for="Distancia">Distancia (Km)</label>
		<input type="number" class="form-control" placeholder="Distancia a la matriz" name="distancia" value="{{old('distancia')}}">
	</div>
</div>
<hr>
<!--REGISTRAR-->
	<input type="submit" value="Agregar" class="btn btn-success btn-block btn-lg" >               
</form>

@include('cliente.errores.error')

@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>
            
@endif

@endsection

@section('scripts')
	<!--MiScript -->
	<script src="{{asset('js/estados-ciudades.js')}}"></script>
@endsection