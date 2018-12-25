<!-- Ventana Modal -->
<div class="modal fade" id="ventana">
 	<div class="modal-dialog">
 		<div class="modal-content">
 		<!-- HEADER -->
            <div class="modal-header">
                <h2 class="modal-title">Nuevo Cliente</h2>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
             	<form action="/Cliente/nuevo/add" method="post" id="frmAgregar">     
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
								<option value="{{$estado->idEstado}}" data-estado="{{$estado->estado}}">{{$estado->estado}}</option>
								@endforeach
							</select>
							<label for="Ciudad">Ciudad</label>
							<select class="form-control" name="idCiudad" id="ciudades">
								
							</select>
							<label for="Direccion">Direccion</label>
							<input type="text" class="form-control" placeholder="Calle, Mz, Lt, Colonia" name="direccion" value="{{old('direccion')}}">
							<label for="Distancia">Distancia (Km)</label>
							<input type="number" class="form-control" placeholder="Distancia a la matriz" name="distancia" value="{{old('distancia')}}">
						</div>
					</div>
					<hr>
					<!--REGISTRAR-->
					<input type="submit" value="Agregar" class="btn btn-success btn-block btn-lg" id="btnRegistrar">
				</form>                          
			</div>
			
			<!-- FOOTER -->
            <div class="modal-footer">
            	<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
            </div>	 
        </div>
    </div>
</div>