<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_usuario', function (Blueprint $table) {
            $table->id();
            // $table->string('run');
            $table->string('run')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('imagen')->nullable();
            $table->integer('id_grupo')->nullable();
            $table->integer('id_company')->nullable();
            $table->string('config_theme')->default('default');
            $table->string('integrations')->nullable();
            $table->integer('sexo')->nullable();
            $table->json('config')->nullable();
            $table->date('birthdate')->nullable();
            $table->datetime('last_session')->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('bloqueado')->default(false);
            $table->boolean('activo')->default(true);

            // log de vehiculo
            $table->integer('en_ruta_id_vechiculo')->nullable();
            $table->boolean('en_ruta_conectado')->default(false);

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
        Schema::dropIfExists('s_usuario');
    }
}
