<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id_empresa');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('id_servicio')->unsigned();
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id_producto')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
