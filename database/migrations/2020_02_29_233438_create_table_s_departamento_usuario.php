<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSDepartamentoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_departamento_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->foreignId('id_departamento')->references('id')->on('s_departamento');
            $table->integer('permiso_evento')->default(3);
            $table->integer('permiso_votacion')->default(3);
            $table->integer('permiso_bicicleta')->default(3);
            $table->integer('permiso_tutoria')->default(4);
            $table->integer('permiso_formulario')->default(3);
            $table->integer('permiso_servicio')->default(3);
            $table->integer('permiso_sala_video')->default(3);
            $table->integer('permiso_toma_hora')->default(3);
            $table->integer('permiso_alumno')->default(3);
            $table->boolean('administrador')->default(false);
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
        Schema::dropIfExists('s_departamento_usuario');
    }
}
