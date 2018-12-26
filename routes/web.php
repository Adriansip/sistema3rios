<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Estatus','EstatusController@index');
Route::post('/Estatus/mostrar','EstatusController@show');
Route::get('/Estatus/{idBitacora}/excel','EstatusController@excel');



Auth::routes();

Route::group(['middleware'=> ['admin']],function(){	
	Route::get('/Clientes','ClientesController@index');
	Route::get('/Cliente/nuevo','ClientesController@create');	
	Route::get('/Cliente/{idCliente}','ClientesController@show');
	Route::post('/Cliente/nuevo/add','ClientesController@store');
	Route::post('/Cliente/actualizar/{idCliente}','ClientesController@update');
	Route::get('/Cliente/eliminar/{idCliente}','ClientesController@destroy');	

	Route::get('/Bitacora','BitacoraController@index');
	Route::get('/Bitacora/listar/{idBitacora}','BitacoraController@show');
	Route::get('/Bitacora/crear','BitacoraController@create');
	Route::post('/Bitacora/add','BitacoraController@store');
	Route::post('/Bitacora/actualizar/{idBitacora}','BitacoraController@update');
	Route::get('/Bitacora/editar/{idBitacora}','BitacoraController@edit');
	Route::get('/Bitacora/eliminar/{idBitacora}','BitacoraController@destroy');

	Route::post('/Estatus/create/{idBitacora}','EstatusController@store');
	Route::get('/Estatus/agregar/{noEmbarque}','EstatusController@edit');
	Route::post('/Estatus/eliminar','EstatusController@destroy');

	Route::post('/Estatus/actualizar/{idEstatus}','EstatusController@update');
	Route::get('/Estatus/listar/{idEstatus}','EstatusController@getEstatus');


	Route::get('/Ciudades/{idCiudad}','CiudadesController@show');
});

Route::get('/home', 'HomeController@index')->name('home');
