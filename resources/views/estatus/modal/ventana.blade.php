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
                    <form action="/Estatus/create/{{$bitacora->idBitacora}}" method="post" id="frmAgregar">   
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
					<input type="submit" class="btn btn-success btn-block" id="btnRegistrar" value="Agregar">                   

					</form>

				</div>
			<!-- FOOTER -->
            	<div class="modal-footer">                    
                	<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                </div>	 
        	</div>
    	</div>
	</div>