@extends('layouts.app')

@section('content')
	<h1 class="text-center">Ver Estatus</h1>
		<h3 class="text-right alert alert-info" id="bitacora" data-id="{{$bitacora->idBitacora}}">Numero de embarque: 
		{{$bitacora->noEmbarque}}
		</h3>
	<div class="">
		<h4 class="text-left col-lg-10">Fecha y hora de embarque: {{$bitacora->created_at}}</h4>
		<p class="text-right"><button type="button" data-target="#ventana" data-toggle="modal" class="btn btn-primary btn-lg col-lg-3" id="btnAgregar">Añadir estatus <img src="{{asset('imagenes/agregar.png')}}" alt="agregar"></button></p>
	</div>
	<hr>
	<div class="row">		
			<div class="table-responsive-sm col-lg-12">
				<table class="table table-striped table-bordered table-sm">
					<thead class="thead-light">
						<tr>
	                    	<th scope="col" class="text-center"># Transito</th>
	                        <th scope="col" class="text-center">Lugar</th>
	                        <th scope="col" class="text-center">Fecha y hora</th>
	                        <th scope="col" class="text-center">Observacion</th>
	                        <th scope="col" class="text-center"></th>
	                        <th scope="col" class="text-center"></th>
	                    </tr>
	                </thead>
	                <tbody>   
	                <tr class="table-info">
	                		<td scope="col" class="text-center"></td>
	                		<td scope="col" class="text-center">3 Rios logitica</td>
	                		<td scope="col" class="text-center">{{$bitacora->created_at}}</td>
	                		<td colspan="3" class="text-center">Embarque</td>
	                </tr>                 
					@foreach($bitacora->estatus as $registro)
						@if($registro->entregado)
						<tr class="table-warning">
						@else
						<tr>
						@endif
							<th scope="row" class="text-center">{{$registro->noTransito}}</th>    
							<td scope="col" class="text-center">{{$registro->lugar}}</td>
							<td scope="col" class="text-center">{{$registro->fecha}} - {{$registro->hora}}</td>
							<td scope="col" class="text-center">{{$registro->observacion->observacion}} 
							@if($registro->otro!=null)
								- {{$registro->otro}}
							@endif
							</td>
							
							<td>								
								<button class="btn btn-info btn-block editar"  data-target="#ventana" data-toggle="modal" value="{{$registro->idEstatus}}">Editar</button></td>				
								<div class="form-comtrol">
									<form action="/Estatus/eliminar" method="post">
										{{csrf_field()}}										
										<td><button type="submit" onclick="return confirm('¿Seguro de que desea eliminar este registro?')" class="btn btn-danger btn-block" name="eliminar" value="{{$registro->idEstatus}}">Eliminar</button></td>											
									</form>					
								</div>
						</tr>
					@endforeach                    
	                </tbody>                    
	            </table>			
		</div>	
	</div>
		
	@include('estatus.errores.error')

	@include('estatus.modal.ventana') <!-- Para agregar -->


	
@if(Session::has('message'))
<div class="alert alert-{{Session::get('class')}}">
   	<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}
</div>      
@endif


@endsection


@section('scripts')
	<!--JQuery -->
	<script src="{{asset('js/estatus/estatus.js')}}"></script>
	 <script src="{{asset('js/estados-ciudades.js')}}"></script>
	
@endsection