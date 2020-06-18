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
        
        //Select a users que no es el que esta actualmente conectado
        $users = User::where('id','!=',Auth::user()->id)->get();        


        //Select a mensajes que yo sea el destinatario y que no haya marcado como leido
        $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->orwhere('leer','=','true')->get();

        //retornar a la vista con las colsultas para su uso
        return  view('notificaciones')->with('users',$users)->with('mensajes',$mensajes);
        
    }


    public function filtrarMensajes(Request $request){

        //si el input esta vacio o es igual a "todo" entonces retornar todos los mensajes
        if ($request->filtrarNombre== '' || $request->filtrarNombre == 'todo') { 

         //Select a users que no es el que esta actualmente conectado
         $users = User::where('id','!=',Auth::user()->id)->get();        

         //Select a mensajes que yo sea el destinatario y que no haya marcado como leido
         //HACER arreglar esta consulta a where = 1--------
         $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->orwhere('leer','=','true')->get();
 
         return  view('notificaciones')->with('users',$users)->with('mensajes',$mensajes);
        }else{
            //Si se filtra correctamente            
            
         //Select a users que no es el que esta actualmente conectado
         $users = User::where('id','!=',Auth::user()->id)->get();        
     

        //Seleccionar la id del remitente segun el nombre que filtramos
        $idRemitente = User::select('id')->where('name','like',$request->filtrarNombre.'%')->value('id');


        //retornar los mensajes en el cual el destinatario sea el usuario actual y el remitente el que filtramos por el input
         $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)
         ->where('remitente_id','=',$idRemitente)->get();


         return  view('notificaciones')->with('users',$users)->with('mensajes',$mensajes);



        }





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
        //llamar a todos los usuarios menos el contectado actualmente
        $users = User::where('id','!=',Auth::user()->id)->get(); 
        //llamar a todos los mensajes en los que el destinatario sea el usuario actual | ahora que lo veo esta consulta esta de adorno
        $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->get();

        /*
        DB::insert([
            ['contenido_mensaje' => $request->mensaje,
            'remitente_id' => Auth::user()->id,
            'destinatario_id' => $request->destinatario_id
            ],            
        ])  ;*/

        //Crear el mensaje
        Mensaje::create(
            ['contenido_mensaje' => $request->mensaje,
            'remitente_id' => Auth::user()->id,
            'destinatario_id' => $request->destinatario_id]
        ) ;
        
        


         //Select a users que no es el que esta actualmente conectado
         $users = User::where('id','!=',Auth::user()->id)->get();        
         //Select a mensajes que yo sea el destinatario y que no haya marcado como leido
         $mensajes = Mensaje::where('destinatario_id','=',Auth::user()->id)->orwhere('leer','=','true')->get();
 
            
         return  view('notificaciones')->with('users',$users)->with('mensajes',$mensajes);
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
        //en desarrollo

        
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
