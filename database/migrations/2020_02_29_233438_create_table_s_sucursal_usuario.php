<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSSucursalUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_sucursal_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sucursal')->references('id')->on('s_sucursal');
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->integer('rol');
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
        Schema::dropIfExists('s_sucursal_usuario');
    }
}
