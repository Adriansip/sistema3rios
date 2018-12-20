<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientesStoreRequest;

use Illuminate\Support\Facades\Input;

use App\Estados;
use App\Clientes;
use App\Ciudades;

use Session;
use Redirect;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.cliente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estados::all();
        $ciudades=Ciudades::where('idEstado',1)->get();        
        return view('cliente.insertar',compact('estados','ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesStoreRequest $request)
    {
        $cliente=new Clientes;

        $cliente->nombre=Input::get('nombre');
        $cliente->correo=Input::get('correo');
        $cliente->telefono=Input::get('telefono');
        $cliente->idCiudad=Input::get('idCiudad');
        $cliente->direccion=Input::get('direccion');
        $cliente->distancia=Input::get('distancia');

        if($cliente->save()){
            Session::flash('message','cliente guardado correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }        

        return Redirect::to('/Cliente/nuevo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Clientes::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

