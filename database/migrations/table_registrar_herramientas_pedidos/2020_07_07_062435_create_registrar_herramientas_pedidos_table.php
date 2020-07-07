<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrarHerramientasPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrar_herramientas_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_pedido');
            $table->integer('id_herramienta');                        
            $table->string('estado_herramienta')->default('Prestada');
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
        Schema::dropIfExists('registrar_herramientas_pedidos');
    }
}
