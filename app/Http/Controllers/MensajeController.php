<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id','!=',Auth::user()->id)->get();        
        $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->orwhere('leer','=','true')->get();
        
        return  view('notificaciones')->with('users',$users)->with('mensajes',$mensajes);
        
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
        $users = User::where('id','!=',Auth::user()->id)->get(); 
        $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->get();

        /*
        DB::insert([
            ['contenido_mensaje' => $request->mensaje,
            'remitente_id' => Auth::user()->id,
            'destinatario_id' => $request->destinatario_id
            ],            
        ])  ;*/

        Mensaje::create(
            ['contenido_mensaje' => $request->mensaje,
            'remitente_id' => Auth::user()->id,
            'destinatario_id' => $request->destinatario_id]
        ) ;
        
        
        
            
        //return  view('mensajes')->with('users',$users)->with('mensajes',$mensajes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    public function read($id)
    {
        

        
        Mensaje::where('id', $id)
            ->update(['leer' => false]);

            return view('home');
        //Mensaje::update('update mensajes set leer = false where id =' [$request->id] );

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
