<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_herramientas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_pedido');
            $table->string('categoria');
            $table->integer('cantidad');
            $table->date('fecha_devolucion')->nullable();
            $table->string('estado_herramienta')->default('Por confirmar');
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
        Schema::dropIfExists('pedido_herramientas');
    }
}
