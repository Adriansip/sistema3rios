@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('css/placas/tabladinamica.css')}}">
@endsection


@section('content')
<h1 class="text-center">Listado de Placas de Unidades</h1>	
<div class="">	
	<p class="text-right"><button href="" class="btn btn-primary btn-lg" id="btnNuevo" data-target="#ventana" data-toggle="modal">Nueva Unidad/Placa<img src="{{asset('imagenes/agregarusuario.png')}}" alt="agregartransportista"></button></p>
	<hr>
</div>	
	
<div class="table-responsive-sm col-lg-12">
	<table id="example" class="display table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Transportistas</th>
                <th>idPlaca</th>
                <th># Placa</th>
                <th>idTipoUnidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($placas as $placa)
				<tr>
					<td class="details-control"></td>
					<td class="text-center">{{$placa->idPlaca}}</td>
					<td class="text-center">{{$placa->noPlaca}}</td>
					<td class="text-center">{{$placa->idTipoUnidad}}-{{$placa->unidad->tipoUnidad}}</td>

					<td class="text-center">
						<a role="button" aria-pressed="true" href="" class="btn btn-info btn-lg">Editar
						<img src="{{asset('imagenes/editar.png')}}" alt="editar"></a></td>
					<td class="text-center">
						<a role="button" aria-pressed="true" href="" class="btn btn-danger btn-lg">ELiminar
						<img src="{{asset('imagenes/eliminar.png')}}" alt="eliminar"></a></td>
					</td>										
				</tr>
        	@endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Transportistas</th>
                <th>idPlaca</th>
                <th># Placa</th>
                <th>idTipoUnidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@include('transportista.errores.error')
@include('transportista.modal.ventana')

<!--Recibir resultado-->
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
 		{{Session::get('message')}}</div>       
@endif


@section('scripts')			

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script src="{{asset('js/placas/tabladinamica.js')}}"></script>
	
@endsection
