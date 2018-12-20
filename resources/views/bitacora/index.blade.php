@extends('layouts.app')


@section('estilos')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
	<h1 class="text-center">Bitacora index</h1>

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
					<th scope="row">{{$bitacora->idBitacora}}</th>
					<td class="text-center">{{$bitacora->idCliente}} - {{$bitacora->cliente->nombre}}</td>
					<td class="text-center">{{$bitacora->noEmbarque}}</td>
					<td class="text-center">{{$bitacora->kilosBrutos}}</td>
					<td class="text-center">{{$bitacora->kilosNetos}}</td>
					<td class="text-center">{{$bitacora->numeroTarimas}}</td>

					<td><a role="button" aria-pressed="true" href="{{url('/Estatus/agregar')}}/{{$bitacora->noEmbarque}}" class="btn btn-primary btn-lg btn-block">Ver
						<img src="{{asset('imagenes/ver.png')}}" alt="editar"></button></td>
					<td><button class="btn btn-info btn-lg btn-block">
						  Editar <img src="{{asset('imagenes/editar.png')}}" alt="editar">
					</button></td>
					<td>
						<button class="btn btn-danger btn-lg btn-block ">
						  Eliminar <img src="{{asset('imagenes/eliminar.png')}}" alt="eliminar">
					</button></td>
					</td>	
				</tr>
				@endforeach
		</tbody>
	</table>
</div>
@endsection


@section('scripts')		
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#tblBitacora').DataTable();
		});
	</script>
@endsection