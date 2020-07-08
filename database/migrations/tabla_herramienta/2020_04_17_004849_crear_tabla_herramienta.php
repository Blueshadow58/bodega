<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaHerramienta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramienta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen',100);
            $table->string('descripcion',100);
            $table->string('nombre',100);
            $table->string('categoria');
            $table->string('estado')->default('disponible');
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
        Schema::dropIfExists('herramienta');
    }
}
