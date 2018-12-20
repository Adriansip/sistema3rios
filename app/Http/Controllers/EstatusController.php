<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstatusExport;
use App\Http\Requests\EstatusUpdateRequest;

use App\Estatus;
use App\Observaciones;
use App\Bitacora;
use App\Estados;
use App\Ciudades;
use App\Clientes;

use Session;
use Redirect;

class EstatusController extends Controller
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

        if(count($clientes)>0 && count($estados)>0){
            return view('estatus.index',compact('clientes','estados'));
        }else{
            Session::flash('message','No hay registros en la BD');
            Session::flash('class','danger');
            return Redirect::to('/');            
        }
    }

    public function getEstatus($idEstatus){
        $estatus=Estatus::where('idEstatus',$idEstatus)->first();
        $entregado=$estatus->entregado;
        $noTransito=$estatus->noTransito;

        $ciudad=explode(",",$estatus->lugar);        
        
        $ciudad=Ciudades::where('ciudad',$ciudad[0])->first();

        $idEstado=$ciudad->estado->idEstado;
        $estado=$ciudad->estado->estado;

        $observaciones=$estatus->observacion;

        $idObservacion=$observaciones->idObservacion;
        $observacion=$observaciones->observacion;
        $otro=$estatus->otro;

        $data=array(
            "estatus" => $estatus,
            "noTransito" => $noTransito,
            "ciudad" => $ciudad,                                    
            "idObservacion" => $idObservacion,
            "observacion" => $observacion,
            "otro" => $otro,
            "entregado" => $entregado
        );

        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idBitacora)
    {
        $estatus=new Estatus;

        $estatus->idBitacora=$idBitacora;
        $estatus->idCapturador=1;         //PEndiente
        $noEmbarque=$estatus->bitacora->noEmbarque;

        //Armar lugar Edo, ciudad
        $idCiudad=$request->input('idCiudad');
        $ciudad=Ciudades::where('idCiudad',$idCiudad)->first();
        $estado=$ciudad->estado->estado;
        
        //Guardar lugar
        $estatus->lugar=$ciudad->ciudad.", ".$estado;
        
        $estatus->noTransito=$request->input('noTransito');
        $estatus->fecha=$request->input('fecha');
        $estatus->hora=$request->input('hora');

        $estatus->idObservacion=$request->input('idObservacion');
        
        $estatus->otro=$request->input('otro');
        
        $entregado=$request->input('entregado');
        if($entregado=='on'){
            $estatus->entregado=true;    
        }
        

        if($estatus->save()){
            Session::flash('message','Estatus guardado correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }

        return Redirect::to('/Estatus/agregar/'.$noEmbarque);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //Buscar por cliente
        $dato=$request->input('cliente');

        if($dato==null){ //Si cliente esta vacio
            $dato=$request->input('noEmbarque');    //Buscar por numero de embarque
            if($dato!=null){
                $bitacoras=Bitacora::where('noEmbarque',$dato)->get();               
            }else{ //Si ambos datos vienen vacio
                Session::flash('message','Por favor ingrese un dato');
                Session::flash('class','danger');

                return Redirect::to('/Estatus');
            }
        }else{
            //Si consulta por cliente debemos mostrar todos los estatus de cada bitacora
            $bitacoras=Bitacora::where('idCliente',$dato)->get();      
        }        

        if(count($bitacoras)==0){
            Session::flash('message','El cliente u orden de embarque no tienen registros');
            Session::flash('class','warning');
            return Redirect::to('/Estatus');
        }
        
        return view('estatus.ver',compact('bitacoras'));               
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($noEmbarque)
    {
        
        $bitacora=Bitacora::where('noEmbarque',$noEmbarque)->first();                    

        if($bitacora!=null){    
            $transito=$bitacora->estatus->last();
            
            if($transito==null){
                $transito=1;
            }else{
                $transito=($transito->noTransito)+1;
            }

            $estados=Estados::all();            
            $observaciones=Observaciones::all();     
            
            return view('estatus.agregar',compact('bitacora','estados','observaciones','transito'));
        }else{
            //PEndiente retornar mensage de session y checar ruta
            return 'No hay registros';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstatusUpdateRequest $request,$idEstatus)
    {
        
        $estatus=Estatus::where('idEstatus',$idEstatus)->first();

        $ciudad=Ciudades::where('idCiudad',$request->idCiudad2)->first();        
        $estatus->lugar=$ciudad->ciudad.", ".$ciudad->estado->estado;

        $estatus->noTransito=$request->_noTransito;

        $estatus->fecha=$request->_fecha;
        $estatus->hora=$request->_hora;

        $estatus->idObservacion=$request->idObservacion2;

        $estatus->otro=$request->otro2;
        
        $entregado=$request->entregado2;

        if($entregado){
            $entregado=true;            
        }

        $estatus->entregado=$entregado;

        if($estatus->save()){
            Session::flash('message','Estatus actualizado correctamente');
            Session::flash('class','success');        
        }else{
            Session::flash('message','Verifique que todos los datos esten completos');
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
    public function destroy(Request $request)
    {        
        $id=$request->input('eliminar');
        Estatus::destroy($id);

        Session::flash('message','Estatus eliminado correctamente');
        Session::flash('class','success');

        return back();
    }

    public function excel($idBitacora)
    {
      return Excel::download(new EstatusExport,'Estados.xlsx');
    }
}
