<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTableOrOrdenRepartidor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('or_orden_repartidor', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario')->nullable();
            // $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->foreignId('id_repartidor')->references('id')->on('s_usuario');
            $table->foreignId('id_orden')->references('id')->on('or_orden');
            $table->integer('posicion_retiro')->nullable();
            $table->integer('posicion_despacho')->nullable();
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('or_orden_repartidor');
    }
}
