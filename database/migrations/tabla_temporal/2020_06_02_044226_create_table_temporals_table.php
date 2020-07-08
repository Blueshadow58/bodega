<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTemporalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_temporals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
            $table->bigInteger('id_usuario');
            $table->integer('cantidad');
            $table->string('tipo_producto');            
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
        Schema::dropIfExists('table_temporals');
    }
}
