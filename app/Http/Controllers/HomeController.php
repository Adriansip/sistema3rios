<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use App\Estados;
use App\Observaciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         return view('home');
    }
    
}
