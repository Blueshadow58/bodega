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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Funcionana igual pero todas las rutas del group van a filtarr primero si tiene los permisos
//Route::get('/bodeguero/confirmarPedido', 'BodegaController@index')-> name('confirmarPedido')->middleware('permiso.confirmar-pedido');
Route::group(['middleware' => ['permiso:confirmar-pedido']], function () {
    Route::get('/confirmarPedido', 'BodegaController@index')->name('confirmarPedido');
}); 



Route::get('/mensajes', 'MensajeController@index');


//Crear notificacion
Route::post('/mensajes.store', 'MensajeController@store');

//leer
//Route::post('/mensajes.leer', 'MensajeController@read');

//Route::get('/mensajes.leer  ', 'MensajeController@read');

Route::post('mensajes.leer/{id}','MensajeController@read');


//---------------------------------------------------------------
//Ya cuentan con su nueva vista
Route::get('perfil',function(){
return view('perfil');
});

Route::view('registro-ordenes','registro-ordenes');

Route::view('notificaciones','notificaciones');

Route::view('home-bodega','home-bodega');


//----------------------------------------------------------------

Route::get('/pedido', 'PedidoController@index');


Route::post('/pedido.store', 'PedidoController@store');




Route::get('/pedidoHerramienta', 'PedidoHerramientaController@index');
Route::post('/pedidoHerramienta.lista', 'PedidoHerramientaController@lista');


//agregar lista 
Route::post('/pedidoHerramienta.agregar', 'PedidoHerramientaController@agregar');


//Route::view('newlogin','/auth/newlogin');



//Route::get('/herramientas','HerramientasController@index');

//Route::get('/herramientas/create','HerramientasController@create');

Route::resource('herramientas','HerramientasController');


Route::resource('materiales','MaterialesController');
    