<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_departamento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('descripcion',300);
            $table->string('foto')->nullable();
            $table->json('config')->nullable();
            $table->integer('plataforma_evento')->default(2);
            $table->integer('plataforma_bicicleta')->default(2);
            $table->integer('plataforma_votacion')->default(2);
            $table->integer('plataforma_tutoria')->default(2);
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
        Schema::dropIfExists('s_departamento');
    }
}
