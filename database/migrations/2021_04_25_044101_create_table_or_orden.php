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
            $table->double('remitente_lat')->nullable();
            $table->double('remitente_lng')->nullable();
            $table->foreignId('remitente_id_comuna')->references('id')->on('s_comuna');

            // Datos Destinatario
            $table->string('destinatario_nombre')->nullable();
            $table->string('destinatario_direccion')->nullable();
            $table->string('destinatario_numero')->nullable();
            $table->string('destinatario_correo')->nullable();
            $table->string('destinatario_telefono')->nullable();
            $table->double('destinatario_lat')->nullable();
            $table->double('destinatario_lng')->nullable();
            $table->foreignId('destinatario_id_comuna')->references('id')->on('s_comuna');

            $table->string('mensaje')->nullable();

            // Datos Orden
            $table->double('valor_estimado')->default(0);

            // Configuracion de orden
            $table->double('precio')->default(0);

            // Extras con integraciones
            $table->json('config')->nullable();

            // Recepcion de remitente
            $table->boolean('receptor_remitente')->default(false);
            $table->string('recepcion_remitente_rut')->nullable();
            $table->string('recepcion_remitente_nombre')->nullable();
            $table->string('recepcion_remitente_imagen')->nullable();

            //Datos recepcion destinatario
            $table->boolean('receptor_destinatario')->default(false);
            $table->string('recepcion_destinatario_rut')->nullable();
            $table->string('recepcion_destinatario_nombre')->nullable();
            $table->string('recepcion_destinatario_imagen')->nullable();



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