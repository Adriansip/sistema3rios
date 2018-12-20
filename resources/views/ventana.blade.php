<div class="modal fade" id="ventana2">
	 	<div class="modal-dialog">
	 		<div class="modal-content">
	 		<!-- HEADER -->
                <div class="modal-header">                            
                    <h2 class="modal-title">Editar estatus</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
            <!-- BODY -->
                <div class="modal-body">
                    <form action="" method="post" id="formActualizar">   
                    {{csrf_field()}}
                    <div class="row">                    	
						<div class="col-lg-6">				
							<label for="noTransito">Numero de transito</label>
							<input type="number" class="form-control" name="_noTransito" readonly="" value="">							
							<label for="Nombre">Estado</label>
							<select class="form-control" name="idEstado2" id="estados2">
									<option value="" id="estadoActual"></option>
								@foreach($estados as $estado)
									<option value="{{$estado->idEstado}}">{{$estado->estado}}</option>
								@endforeach
							</select>
							<label for="Ciudad">Ciudad</label>
							<select class="form-control" name="idCiudad2" id="ciudades2">		
								<!--<option value="" id="ciudadActual"></option>-->
      							@foreach($estados[0]->ciudades as $ciudad)
									<option value="{{$ciudad->idCiudad}}">{{$ciudad->ciudad}}</option>
								@endforeach
							</select>
							<label for="Fecha">Fecha</label>
							<input type="date" class="form-control" name="_fecha" value="">						
						</div>
						<div class="col-lg-6">
							<label for="Hora">Hora</label>
							<input type="time" class="form-control"  name="_hora" value="">
							<label for="Observacion">Observacion</label>
							<select class="form-control" name="idObservacion2" id="observaciones">
								<option value="" id="observacionActual"></option>
      							@foreach($observaciones as $observacion)
									<option value="{{$observacion->idObservacion}}">{{$observacion->observacion}}</option>
      							@endforeach
							</select>
							<label for="Otro">Otra observacion</label>
							<textarea class="form-control" placeholder="Otra observacion" name="otro2" value="Ninguna" id="textarea"></textarea>
							<br>
							<div class="form-check">
							<input type="checkbox" class="form-check-input" id="entregado2" name="entregado2" > 
							<label class="form-check-label" for="Entrega">¿Entrega Final?</label>
							</div>
						</div>
					</div>    
					<br>
					<input type="submit" class="btn btn-secondary btn-block" value="Actualizar">                   
					</form>
				</div>
			<!-- FOOTER -->
            	<div class="modal-footer">                    
                	<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                </div>	 
        	</div>
    	</div>
	</div>