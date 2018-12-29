<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TranPlacas;
use App\Operadores;
class TranPlacasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOperadoresTrans($idPlaca)
    {
        $transportista=TranPlacas::where('idPlaca',$idPlaca)->first();
        $idPlaca=$transportista->placas->idPlaca;        
        $operador=Operadores::where('idPlaca',$idPlaca)->first();

        $data=[
            'transportista' => $transportista->transportistas,
            'operador' => $operador
        ];

        return $data;
    }


    public function showPlacas($idTransportista)
    {
        $placas=TranPlacas::where('idTransportista',$idTransportista)->get();
        
        $data=array();
        $noPlacas=[]; 
        foreach ($placas as $placa) {
            $noPlacas=[
                'placa' => $placa->placas,
                'tipoUnidad' => $placa->placas->unidad
            ];
            array_push($data, $noPlacas);
        }

        return $data;
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
