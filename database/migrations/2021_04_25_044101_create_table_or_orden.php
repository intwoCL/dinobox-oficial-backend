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
            $table->integer('id_usuario')->nullable();
            // $table->integer('id_usuario')->nullable();


            $table->double('precio')->default(0);
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
