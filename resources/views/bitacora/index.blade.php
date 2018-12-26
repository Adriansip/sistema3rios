@extends('layouts.app')

@section('estilos')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
<h1 class="text-center">Listado de Bitacoras</h1>

<div class="table-responsive-sm col-lg-12" >
	<table id="tblBitacora" class="table table-striped table-bordered table-sm">
		<thead>			
			<th scope="col" class="text-center">ID Bitacora</th>
			<th scope="col" class="text-center">Id cliente</th>
			<th scope="col" class="text-center">Numero de Embarque</th>
			<th scope="col" class="text-center">Kilos Brutos</th>
			<th scope="col" class="text-center">Kilos netos</th>
			<th scope="col" class="text-center">Numero de tarimas</th>
			<th scope="col" class="text-center">Ver</th>
			<th scope="col" class="text-center">Editar</th>
			<th scope="col" class="text-center">Eliminar</th>
		</thead>
		<tbody>			
				@foreach($bitacoras as $bitacora)
				<tr>
					<th scope="row" class="text-center">{{$bitacora->idBitacora}}</th>
					<td class="text-center">{{$bitacora->idCliente}} - {{$bitacora->cliente->nombre}}</td>
					<td class="text-center">{{$bitacora->noEmbarque}}</td>
					<td class="text-center">{{$bitacora->kilosBrutos}}</td>
					<td class="text-center">{{$bitacora->kilosNetos}}</td>
					<td class="text-center">{{$bitacora->numeroTarimas}}</td>

					<td><a role="button" aria-pressed="true" href="{{url('/Estatus/agregar')}}/{{$bitacora->noEmbarque}}" class="btn btn-primary btn-lg btn-block">Ver Estatus
						<img src="{{asset('imagenes/ver.png')}}" alt="Ver"></a></td>

					<td><a role="button" aria-pressed="true" href="{{url('/Bitacora/editar')}}/{{$bitacora->idBitacora}}" class="btn btn-info btn-lg btn-block">Editar
						<img src="{{asset('imagenes/editar.png')}}" alt="editar"></a></td>

					<td>
						<a href="/Bitacora/eliminar/{{$bitacora->idBitacora}}"><button class="btn btn-danger btn-lg" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">
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