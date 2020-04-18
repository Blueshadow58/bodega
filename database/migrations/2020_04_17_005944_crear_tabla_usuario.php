<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut',9);
            $table->string('nombre',15);
            $table->string('clave',255);
            $table->string('telefono',15);
            $table->string('email',15);
            $table->string('direccion',255);
            $table->string('apellido',15);
            $table->string('segundo_apellido',15);
            $table->dateTime('fecha_nacimiento');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
