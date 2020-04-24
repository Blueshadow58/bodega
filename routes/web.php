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

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')-> name('home');
=======
Route::get('/home', 'HomeController@index')->name('home');

Route::get('inicio',function(){
return view('perfilusuario');
});


Route::get('usuariomp',function(){
return view('modificarperfil');
});

Route::get('usuarionoti',function(){
    return view('notificacionus');
    });
>>>>>>> 0992e5d656aaab85388dfe6e6051f4770126b822
