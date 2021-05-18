<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('or_orden', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('codigo_transaccion')->nullable();

            $table->date('fecha_entrega');

            $table->integer('id_usuario')->nullable();
            $table->integer('id_cliente')->nullable();

            // Datos Remitente
            $table->string('remitente_rut')->nullable();
            $table->string('remitente_nombre')->nullable();
            $table->string('remitente_direccion')->nullable();
            $table->string('remitente_numero')->nullable();
            $table->string('remitente_correo')->nullable();
            $table->string('remitente_telefono')->nullable();
            $table->foreignId('remitente_id_comuna')->references('id')->on('s_comuna');

            // Datos Destinatario
            $table->string('destinatario_nombre')->nullable();
            $table->string('destinatario_direccion')->nullable();
            $table->string('destinatario_numero')->nullable();
            $table->string('destinatario_correo')->nullable();
            $table->string('destinatario_telefono')->nullable();
            $table->foreignId('destinatario_id_comuna')->references('id')->on('s_comuna');
            $table->string('mensaje')->nullable();

            // Datos Orden
            $table->double('valor_estimado')->default(0);

            // Configuracion de orden
            $table->double('precio')->default(0);

            // Extras con integraciones
            $table->json('config')->nullable();

            //Datos recepcion
            $table->string('recepcion_rut')->nullable();
            $table->string('recepcion_nombre')->nullable();

            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();


            $table->integer('accion')->default(1);
            $table->integer('accion_actual')->default(1);
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('or_orden');
    }
}