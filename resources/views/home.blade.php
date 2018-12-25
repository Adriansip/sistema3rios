@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif             
                    <div class="row">
                    
                    <div class="col-lg-5 offset-lg-1">
                        <div class="card">                            
                            <div class="card-header"><h3 class="text-header text-center">Bitacora</h3></div>
                            <div class="card body col-lg-12">
                                <div class="text-center">
                                    <img src="{{asset('imagenes/bitacora.png')}}" alt="" class="img-fluid" width="200px" height="200px">
                                </div> 
                                <div class="list-group">
                                    <a href="{{url('/Bitacora/crear')}}" class="list-group-item list-group-item-action active">
                                    Agregar
                                    </a>
                                    <a href="{{url('/Bitacora')}}" class="list-group-item list-group-item-action">Listar</a> 
                                    <br>
                                </div>                                    
                                </div>                            
                        </div>
                    </div> 
                    <br>

                    <div class="col-lg-5">
                        <div class="card">          
                        <div class="card-header"><h3 class="text-header text-center">Clientes</h3></div>
                            <div class="card body col-lg-12">
                                <div class="text-center">
                                    <img src="{{asset('imagenes/cliente.jpg')}}" alt="" class="img-fluid" width="200px" height="200px">
                                </div> 
                                <div class="list-group">
                                    <a href="{{url('/Cliente/nuevo')}}" class="list-group-item list-group-item-action active">
                                    Agregar
                                    </a>
                                    <a href="{{url('/Clientes')}}" class="list-group-item list-group-item-action">Listar</a> 
                                    <br>
                                </div>                                    
                                </div>                            
                        </div>
                    </div> 
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
