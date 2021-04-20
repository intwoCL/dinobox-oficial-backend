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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('foto')->nullable();
            $table->string('integration')->nullable();
            $table->string('config_theme')->default('default');
            $table->boolean('bloqueado')->default(false);
            $table->json('permisos')->nullable();
            $table->json('config')->nullable();
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
        Schema::dropIfExists('s_usuario');
    }
}
