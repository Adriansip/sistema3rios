@extends('layouts.app');

@section('content')
	<h1 class="text-center">Ver estatus </h1>
	@foreach($bitacoras as $bitacora)
		<h3 class="text-right alert alert-info">Numero de embarque: 
		{{$bitacora->noEmbarque}}
		</h3>
	<div class="row">
		<h4 class="text-left col-lg-10">Fecha y hora de embarque: {{$bitacora->created_at}}</h4>
		<a href="{{url('/')}}" class="btn btn-success btn-lg btn-block col-lg-2 col-md-6" role="button" aria-pressed="true">Descargar Excel</a>
	</div>
	<hr>
	<div class="row">	
		<div class="table-responsive-sm col-lg-12" >
	            <table class="table table-striped table-bordered table-sm">
	                <thead class="thead-light">
	                    <tr>
	                    	<th scope="col"># Transito</th>
	                        <th scope="col">Lugar</th>
	                        <th scope="col">Fecha y hora</th>
	                        <th scope="col">Observacion</th>
	                    </tr>
	                </thead>
	                <tbody>                    
	                	<tr class="bg-success">
	                		<td scope="col"></td>
	                		<td scope="col">3 Rios logitica</td>
	                		<td scope="col">{{$bitacora->created_at}}</td>
	                		<td scope="col">Embarque</td>
	                	</tr>
                   @foreach($bitacora->estatus as $registro)
                    @if($registro->entregado)
						<tr class="table-danger">
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
                    </tr>
                    @endforeach                    
	                </tbody>                    
	            </table>	      
	   	</div>	   	
	</div>	
	@endforeach


	@if(Session::has('message'))
     <div class="alert alert-{{Session::get('class')}}">
     	<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}
     </div>      
	@endif

@endsection


@section('scripts')
	<!--My query-->
	<script src="{{asset('js/estados-ciudades.js')}}"></script>
@endsection