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
            // Datos Remitente
            $table->string('rut_remitente');
            $table->date('fecha_emision');
            $table->string('nombre_remitente');
            $table->string('email_remitente');
            $table->string('telefono_remitente');
            $table->string('direccion_remitente');

            // Dato Destinatario
            $table->string('nombre_destinatario');
            $table->string('direccion_destinatario');
            $table->date('fecha_entrega');
            $table->string('mensaje')->nullable();

            //Datos Orden
            $table->integer('precio_envio')->default(0);

            //Datos del usuarip
            $table->integer('id_usuario')->nullable();

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
