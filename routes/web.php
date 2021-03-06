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


//DomPDF Pedidos
Route::get('descargarPDF','PedidoController@PDF');

//DomPDF Detalle pedidos
Route::post('detallePDF','PedidoController@detallePDF');


//Excel Pedidos

Route::get('descargarExcel','PedidoController@descargarExcelPedidos');


//Filtrar los pedidos por nombre de usuario
Route::post('filtrarNombre','PedidoController@filtrarNombre');



//Filtrar mensajes por nombre de usuario
Route::post('filtrarMensajes','MensajeController@filtrarMensajes');



//todos los barcodes
Route::get('barcode','BarcodeController@index');

//filtrar barcodes
Route::post('barcode-filtro','BarcodeController@filtrarBC');

//PDF Barcode
Route::post('PDFBarcode','BarcodeController@PDFBarcode');


// Segun si tienen permiso podran ingresar a estas rutas
Route::group(['middleware' => ['permiso:bodeguero']], function () {    
Route::get('/pedido', 'PedidoController@index');
Route::post('/pedido.detalle', 'PedidoController@detalle');
Route::post('/pedido.store', 'PedidoController@store');
Route::get('/registro-ordenes', 'PedidoController@index');
});


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

Route::post('mensajes.read','MensajeController@read');

Route::post('mensajes.leer/{id}','MensajeController@read');


//---------------------------------------------------------------
//Ya cuentan con su nueva vista
Route::get('perfil',function(){
return view('perfil');
});



Route::view('notificaciones','notificaciones');

Route::view('home-bodega','home-bodega');


//Mis-Pedidos----------------------------------------------------------------


Route::get('mis-pedidos','MisPedidosController@index');

Route::post('p','MisPedidosController@probar');


Route::post('/detalle-mis-pedidos', 'MisPedidosController@detalleMisPedidos');


//----------------------------------------------------------------



//Registrar pedidos----------------------------------------------------------------


Route::get('registrar-herramientas-pedido','RegistrarHerramientasPedidoController@index');

Route::post('rh-pedido-crear','RegistrarHerramientasPedidoController@crear');


//----------------------------------------------------------------



//Agregar herramientas a la tabla temporal registros-------------------------------------------------------------------------------


Route::post('rh-pedido-generar','RegistrarHerramientasPedidoController@generar');


//agregar las herramientas a la tabla temporal 
Route::post('crear-registro-herramientas-agregar','RegistrarHerramientasPedidoController@agregar');

//eliminar las herramientas en la tabla registro de herramientas
Route::post('crear-registro-herramientas-eliminar','RegistrarHerramientasPedidoController@eliminar');

//editar crear registro herramientas
Route::post('crear-registro-herramientas-editar','RegistrarHerramientasPedidoController@editar');

//cambiar la herramienta
Route::post('crear-registro-herramientas-cambiarHerramienta','RegistrarHerramientasPedidoController@cambiarHerramienta');


//volcar los datos registrados en el pedido
Route::post('volcal-registrar-herramientas','RegistrarHerramientasPedidoController@volcarRegistroHerramientas');



//-------------------------------------------------------------------------------



Route::get('/pedidoHerramienta', 'PedidoHerramientaController@index');
Route::post('/pedidoHerramienta.lista', 'PedidoHerramientaController@lista');


//agregar lista 
Route::post('/pedidoHerramienta.agregar', 'PedidoHerramientaController@agregar');

//agregar lista 
Route::post('/pedidoHerramienta.eliminar', 'PedidoHerramientaController@eliminar');



//enviar datos de tabla temporal a tabla detalles solicitud
Route::post('/pedidoHerramienta.volcar', 'PedidoHerramientaController@volcar');



//Retorno herramientas---------------------------------------------------------------------------------------------------------------------------------------------------

//index
Route::get('/retorno-herramientas', 'RetornoHerramientasController@index');


Route::post('/actualizar-estado-retorno', 'RetornoHerramientasController@actualizarEstado');





// home bodega---------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/home-bodega', 'BodegaController@view');


Route::post('/home-bodega-filtrar', 'BodegaController@filtro');


Route::post('/home-bodega-filtrar-pdf', 'BodegaController@herramientasPDF');

//---------------------------------------------------------------------------------------------------------------------------------------------------



//Route::view('newlogin','/auth/newlogin');



//Route::get('/herramientas','HerramientasController@index');

//Route::get('/herramientas/create','HerramientasController@create');

Route::resource('herramientas','HerramientasController');


Route::resource('materiales','MaterialesController');
    