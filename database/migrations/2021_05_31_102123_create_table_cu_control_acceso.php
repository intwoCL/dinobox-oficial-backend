<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCuControlAcceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cu_control_acceso', function (Blueprint $table) {
        $table->id();
        $table->dateTime('fecha_registro');
        $table->dateTime('fecha_salida')->nullable();
        $table->foreignId('id_usuario')->references('id')->on('s_usuario');
        $table->integer('id_vehiculo')->nullable();
        $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('cu_control_acceso');
    }
}
