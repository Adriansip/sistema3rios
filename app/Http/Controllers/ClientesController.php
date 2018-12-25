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
        $clientes=Clientes::all();
        $estados=Estados::all();
        return view('cliente.index',compact('clientes','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estados::all();
        return view('cliente.insertar',compact('estados'));
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

        $cliente->nombre=$request->input('nombre');
        $cliente->correo=$request->input('correo');
        $cliente->telefono=$request->input('telefono');
        $cliente->idCiudad=$request->input('idCiudad');
        $cliente->direccion=$request->input('direccion');
        $cliente->distancia=$request->input('distancia');

        if($cliente->save()){
            Session::flash('message','Cliente guardado correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }        

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCliente)
    {
        return Clientes::find($idCliente);
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
        $cliente=Clientes::find($id);
        $cliente->fill($request->all());        
        
        if($cliente->save()){
            Session::flash('message','Cliente actualizado correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }        
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {         
        Clientes::destroy($id);

        Session::flash('message','Cliente eliminado correctamente');
        Session::flash('class','success');

        return back();
    }
}

