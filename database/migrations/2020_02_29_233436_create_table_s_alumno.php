<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_alumno', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('run');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->integer('id_sede');
            $table->integer('id_carrera');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('s_alumno');
    }
}
