<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_consulta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('descripcion',300);
            $table->string('contenido',3000)->nullable();
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
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
        Schema::dropIfExists('co_consulta');
    }
}
