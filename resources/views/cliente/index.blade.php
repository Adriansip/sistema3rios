@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
<h1 class="text-center">Listado de Clientes</h1>	
<div class="">	
	<p class="text-right"><button href="" class="btn btn-primary btn-lg" id="btnNuevo" data-target="#ventana" data-toggle="modal">Nuevo Cliente <img src="{{asset('imagenes/agregarusuario.png')}}" alt="agregarusuario"></button></p>
	<hr>
</div>	
	
<div class="table-responsive-sm col-lg-12">
	<table id="tblBitacora" class="table table-striped table-bordered table-sm">
		<thead>			
			<th scope="col" class="text-center">ID Cliente</th>
			<th scope="col" class="text-center">Nombre</th>
			<th scope="col" class="text-center">Correo</th>
			<th scope="col" class="text-center">Telefono</th>
			<th scope="col" class="text-center">Ciudad</th>
			<th scope="col" class="text-center">Direccion</th>
			<th scope="col" class="text-center">Distancia (Km)</th>			
			<th scope="col" class="text-center">Editar</th>
			<th scope="col" class="text-center">Eliminar</th>
		</thead>
		<tbody>			
				@foreach($clientes as $cliente)
				<tr>
					<th scope="row" class="text-center" >{{$cliente->idCliente}}</th>
					<td class="text-center">{{$cliente->nombre}}</td>
					<td class="text-center">{{$cliente->correo}}</td>
					<td class="text-center">{{$cliente->telefono}}</td>
					<td class="text-center ciudad" value="{{$cliente->idCiudad}}">{{$cliente->ciudad->ciudad}} - {{$cliente->ciudad->estado->estado}}</td>
					<td class="text-center">{{$cliente->direccion}}</td>
					<td class="text-center">{{$cliente->distancia}}</td>		
					<td>
						<a class="btn">
						<button class="btn btn-info btn-lg btn-block editar" data-target="#ventana" data-toggle="modal" value="{{$cliente->idCliente}}" data-ciudad="{{$cliente->ciudad}}">
						  Editar <img src="{{asset('imagenes/editar.png')}}" alt="editar">
						</button>
						</a>
					</td>
					<td>
						<a href="/Cliente/eliminar/{{$cliente->idCliente}}" class="btn"><button class="btn btn-danger btn-lg" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">
						  Eliminar<img src="{{asset('imagenes/eliminar.png')}}" alt="eliminar">
						</button>
						</a>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
</div>
@endsection

@include('cliente.modal.ventana')
@include('cliente.errores.error')

<!--Recibir resultado-->
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>       
@endif


@section('scripts')		
	<script src="{{asset('js/estados-ciudades.js')}}"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#tblBitacora').DataTable();
		});
	</script>

	<script src="{{asset('js/clientes/actualizar.js')}}"></script>
@endsection