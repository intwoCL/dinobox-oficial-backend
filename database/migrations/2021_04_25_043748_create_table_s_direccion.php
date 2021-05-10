<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSDireccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_direccion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->references('id')->on('s_cliente');
            $table->foreignId('id_comuna')->references('id')->on('s_comuna');
            $table->string('calle');
            $table->string('numero');
            $table->string('dato_adicional',300)->nullable();
            $table->string('telefono')->nullable();
            $table->boolean('favorito')->default(false);
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
        Schema::dropIfExists('s_direccion');
    }
}
