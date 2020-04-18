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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut',9)->nullable();
            $table->string('name',15);
            $table->string('password',255);
            $table->string('telefono',15)->nullable();
            $table->string('email',255);
            $table->string('direccion',255)->nullable();
            $table->string('apellido',15)->nullable();
            $table->string('segundo_apellido',15)->nullable();
            $table->dateTime('fecha_nacimiento')->nullable();          
            $table->rememberToken();          
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
        Schema::dropIfExists('users');
    }
}
