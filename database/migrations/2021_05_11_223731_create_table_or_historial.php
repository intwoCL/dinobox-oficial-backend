<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTableOrHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('or_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_orden')->references('id')->on('or_orden');
            $table->integer('estado_orden')->nullable();
            $table->integer('id_usuario')->nullable();
            $table->integer('id_repartidor')->nullable();
            $table->string('comantario')->nullable();
            // $table->integer('posicion_retiro')->nullable();
            // $table->integer('posicion_despacho')->nullable();
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
        Schema::dropIfExists('or_historial');
    }
}
