<!-- Ventana Modal -->
	<div class="modal fade" id="ventana">
	 	<div class="modal-dialog">
	 		<div class="modal-content">
	 		<!-- HEADER -->
                <div class="modal-header">                            
                    <h2 class="modal-title">Nuevo Transportista</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

            <!-- BODY -->
                <div class="modal-body">
                    <form action="{{url('/Transportistas/nuevo')}}" method="post" id="frmAgregar">   
                    {{csrf_field()}}                                       
						<div class="col-lg-6">
							<label for="noTransito">Transportista</label>
							<input type="text" class="form-control" name="transportista" placeholder="Nombre">				
						</div>							
					<br>
					<input type="submit" class="btn btn-success btn-block" id="btnRegistrar" value="Agregar">                   					
					</form>								
			<!-- FOOTER -->
				</div>
            	<div class="modal-footer">                    
                	<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                </div>	 
        	</div>
    	</div>
	</div>