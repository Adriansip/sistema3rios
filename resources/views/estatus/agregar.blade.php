
@extends('home')

@section('content')
	<h1 class="text-center">Ver estatus</h1>
		<h3 class="text-right alert alert-info">Numero de embarque: 
		{{$bitacora->noEmbarque}}
		</h3>
	<div class="row">
		<h4 class="text-left col-lg-10">Fecha y hora de embarque: {{$bitacora->created_at}}</h4>
		<button type="button" data-target="#ventana" data-toggle="modal" class="btn btn-primary btn-lg col-md-6 col-lg-2">Añadir estatus</button>				
	</div>
	<hr>
	<div class="row">		
			<div class="table-responsive-sm col-lg-12">
				<table class="table table-striped table-bordered table-sm">
					<thead class="thead-light">
						<tr>
	                    	<th scope="col"># Transito</th>
	                        <th scope="col">Lugar</th>
	                        <th scope="col">Fecha y hora</th>
	                        <th scope="col">Observacion</th>
	                        <th scope="col"></th>
	                        <th scope="col"></th>
	                    </tr>
	                </thead>
	                <tbody>   
	                <tr class="table-info">
	                		<td scope="col"></td>
	                		<td scope="col">3 Rios logitica</td>
	                		<td scope="col">{{$bitacora->created_at}}</td>
	                		<td colspan="3">Embarque</td>
	                </tr>                 
					@foreach($bitacora->estatus as $registro)
						@if($registro->entregado)
						<tr class="table-warning">
						@else
						<tr>
						@endif
							<th scope="row">{{$registro->noTransito}}</th>    
							<td scope="col">{{$registro->lugar}}</td>
							<td scope="col">{{$registro->fecha}} - {{$registro->hora}}</td>
							<td scope="col">{{$registro->observacion->observacion}} 
							@if($registro->otro!=null)
								- {{$registro->otro}}
							@endif
							</td>
							
							<td>								
								<button class="btn btn-success btn-block editar"  data-target="#ventana2" data-toggle="modal" value="{{$registro->idEstatus}}" >Editar</button></td>				
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

	@include('ventana')
	@include('cliente.errores.error')
<!-- Ventana Modal -->
	<div class="modal fade" id="ventana">
	 	<div class="modal-dialog">
	 		<div class="modal-content">
	 		<!-- HEADER -->
                <div class="modal-header">                            
                    <h2 class="modal-title">Nuevo estatus</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

            <!-- BODY -->
                <div class="modal-body">
                    <form action="/Estatus/create/{{$bitacora->idBitacora}}" method="post">   
                    {{csrf_field()}}
                    <div class="row">                    
						<div class="col-lg-6">
							<label for="noTransito">Numero de transito</label>
							<input type="number" class="form-control" name="noTransito" readonly="" value="{{$transito}}">							
							<label for="Nombre">Estado</label>
							<select class="form-control" name="idEstado" id="estados">	
								@foreach($estados as $estado)
									<option value="{{$estado->idEstado}}">{{$estado->estado}}</option>
								@endforeach
							</select>
							<label for="Ciudad">Ciudad</label>
							<select class="form-control" name="idCiudad" id="ciudades">
      							@foreach($estados[0]->ciudades as $ciudad)
									<option value="{{$ciudad->idCiudad}}">{{$ciudad->ciudad}}</option>
								@endforeach
							</select>
							<label for="Fecha">Fecha</label>
							<input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>">						
						</div>
						<div class="col-lg-6">
							<label for="Hora">Hora</label>
							<input type="time" class="form-control"  name="hora" value="<?php echo date('H:i'); ?>">
							<label for="Observacion">Observacion</label>
							<select class="form-control" name="idObservacion" id="observaciones">
      							@foreach($observaciones as $observacion)
									<option value="{{$observacion->idObservacion}}">{{$observacion->observacion}}</option>
      							@endforeach
							</select>
							<label for="Otro">Otra observacion</label>
							<textarea class="form-control" placeholder="Otra observacion" name="otro" value="Ninguna"></textarea>
							<br>
							<div class="form-check">
							<input type="checkbox" class="form-check-input" name="entregado"> 
							<label class="form-check-label" for="Entrega">¿Entrega Final?</label>
							</div>
						</div>
					</div>    
					<br>
					<input type="submit" class="btn btn-success btn-block" value="Agregar">                   
					</form>
				</div>
			<!-- FOOTER -->
            	<div class="modal-footer">                    
                	<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                </div>	 
        	</div>
    	</div>
	</div>

	
@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     	<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>      
@endif

@endsection


@section('scripts')
	<!--JQuery
	<script src="{{asset('js/estatus/estatus.js')}}"></script>-->
	 <script src="{{asset('js/estados-ciudades.js')}}"></script>
	
@endsection