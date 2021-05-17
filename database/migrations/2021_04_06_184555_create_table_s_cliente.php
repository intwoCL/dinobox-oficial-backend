<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_cliente', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique()->nullable();
            $table->string('run')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->string('imagen')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('id_usuario_creador')->nullable();
            $table->integer('sexo')->nullable();
            $table->json('config')->nullable();
            $table->json('integrations')->nullable();
            $table->boolean('verificado')->default(false);
            $table->datetime('last_session')->nullable();
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
        Schema::dropIfExists('s_cliente');
    }
}
