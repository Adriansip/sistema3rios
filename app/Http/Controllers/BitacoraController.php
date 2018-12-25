<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\BitacoraStoreRequest;

use Session;
use Redirect;

use App\Clientes;
use App\Bitacora;
use App\Estados;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacoras=Bitacora::all();        
        return view('bitacora.index',compact('bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $clientes=Clientes::all();
        $estados=Estados::all();
        return view('bitacora.crear',compact('clientes','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BitacoraStoreRequest $request)
    {           
        $bitacora=new Bitacora;
    
        $bitacora->idCliente=$request->input('cliente');
        $bitacora->noEmbarque=$request->input('noEmbarque');
        $bitacora->kilosBrutos=$request->input('kilosBrutos');
        $bitacora->kilosNetos=$request->input('kilosNetos');
        $bitacora->numeroTarimas=$request->input('numeroTarimas');

        if($bitacora->save()){
            Session::flash('message','Bitacora creada correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
                

        return Redirect::route('/Bitacora');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
