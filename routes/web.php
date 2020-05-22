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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')-> name('home');

//Funcionana igual pero todas las rutas del group van a filtarr primero si tiene los permisos
//Route::get('/bodeguero/confirmarPedido', 'BodegaController@index')-> name('confirmarPedido')->middleware('permiso.confirmar-pedido');
Route::group(['middleware' => ['permiso:confirmar-pedido']], function () {
    Route::get('/confirmarPedido', 'BodegaController@index')-> name('confirmarPedido');
}); 




Route::get('perfil',function(){
return view('perfil');
});

//Route::get('/herramientas','HerramientasController@index');

//Route::get('/herramientas/create','HerramientasController@create');

Route::resource('herramientas','HerramientasController');


Route::resource('materiales','MaterialesController');
    