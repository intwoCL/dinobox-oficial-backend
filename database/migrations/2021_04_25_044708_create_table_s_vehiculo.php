<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSVehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_vehiculo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->string('patente');
            $table->string('modelo');
            $table->string('marca');
            $table->integer('tipo');
            $table->string('imagen')->nullable();
            $table->boolean('favorito')->default(false);
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
        Schema::dropIfExists('s_vehiculo');
    }
}
