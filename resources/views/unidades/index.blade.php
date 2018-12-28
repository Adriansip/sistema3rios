@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
<h1 class="text-center">Listado de unidades</h1>	
<div class="">	
	<p class="text-right"><button href="" class="btn btn-primary btn-lg" id="btnNuevo" data-target="#ventana" data-toggle="modal">Nueva unidad <img src="{{asset('imagenes/agregarusuario.png')}}" alt="agregarunidad"></button></p>
	<hr>
</div>	
	
<div class="table-responsive-sm col-lg-12">
	<table id="tblBitacora" class="table table-striped table-bordered table-sm">
		<thead>			
			<th scope="col" class="text-center">ID Unidad</th>
			<th scope="col" class="text-center">Tipo de unidad</th>			
			<th scope="col" class="text-center">Peso min >= (Ton)</th>
			<th scope="col" class="text-center">Peso max < ( Ton)</th>
			<th scope="col" class="text-center">Editar</th>
			<th scope="col" class="text-center">Eliminar</th>
		</thead>
		<tbody>			
				@foreach($unidades as $unidad)
				<tr>
					<th scope="row" class="text-center" >{{$unidad->idTipoUnidad}}</th>
					<td class="text-center">{{$unidad->tipoUnidad}}</td>	
					<td class="text-center" >{{$unidad->min}}</td>	
					<td class="text-center" >{{$unidad->max}}</td>	

					<td class="text-center">
						<a class="btn">
						<button class="btn btn-info btn-xs editar" data-target="#ventana" data-toggle="modal" value="{{$unidad->idTipoUnidad}}">
						  Editar <img src="{{asset('imagenes/editar.png')}}" alt="editar">
						</button>
						</a>
					</td>
					<td class="text-center">
						<a href="" class="btn"><button class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">
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

@include('unidades.errores.error')
@include('unidades.modal.ventana')

<!--Recibir resultado-->
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>       
@endif


@section('scripts')			

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#tblBitacora').DataTable();
		});
	</script>
	
@endsection