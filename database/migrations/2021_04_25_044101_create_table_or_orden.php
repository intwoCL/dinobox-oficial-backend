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

            // Info 1
            $table->foreignId('id_sucursal')->references('id')->on('s_sucursal');
            $table->string('codigo')->unique();
            $table->string('codigo_transaccion')->nullable();
            $table->date('fecha_entrega');
            $table->integer('id_usuario')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->integer('id_direccion')->nullable();

            // Datos Remitente
            $table->string('remitente_run')->nullable();
            $table->string('remitente_nombre');
            $table->string('remitente_direccion')->nullable();
            $table->string('remitente_numero')->nullable();
            $table->string('remitente_correo')->nullable();
            $table->string('remitente_telefono')->nullable();
            $table->double('remitente_lat')->nullable();
            $table->double('remitente_lng')->nullable();
            $table->foreignId('remitente_id_comuna')->references('id')->on('s_comuna');

            // Datos Destinatario
            // $table->string('destinatario_run')->nullable();
            $table->string('destinatario_nombre');
            $table->string('destinatario_direccion')->nullable();
            $table->string('destinatario_numero')->nullable();
            $table->string('destinatario_correo')->nullable();
            $table->string('destinatario_telefono')->nullable();
            $table->double('destinatario_lat')->nullable();
            $table->double('destinatario_lng')->nullable();
            $table->foreignId('destinatario_id_comuna')->references('id')->on('s_comuna');

            // Recepcion de remitente
            $table->datetime('receptor_remitente_fecha')->nullable();
            $table->boolean('receptor_remitente')->default(false);
            $table->string('recepcion_remitente_run')->nullable();
            $table->string('recepcion_remitente_nombre')->nullable();
            // $table->json('recepcion_remitente_imagen')->nullable();

            //Datos recepcion destinatario
            $table->datetime('receptor_destinatario_fecha')->nullable();
            $table->boolean('receptor_destinatario')->default(false);
            $table->string('recepcion_destinatario_run')->nullable();
            $table->string('recepcion_destinatario_nombre')->nullable();
            // $table->json('recepcion_destinatario_imagen')->nullable();

            // Extras con integraciones
            $table->json('config')->nullable();

            $table->boolean('id_usuario_validado')->default(true);


            // Datos Orden
            $table->json('files')->nullable();

            // Verificacion
            $table->integer('id_usuario_verificador')->nullable();

            $table->integer('servicio')->default(10);
            $table->integer('categoria')->nullable();
            $table->double('precio')->default(0);
            $table->string('mensaje', 500)->nullable();

            $table->integer('estado')->default(10);
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