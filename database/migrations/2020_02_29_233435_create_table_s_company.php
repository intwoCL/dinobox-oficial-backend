<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_company', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sucursal')->references('id')->on('s_sucursal');
            $table->string('nombre',100);
            $table->string('imagen')->nullable();
            $table->json('config')->nullable();
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
        Schema::dropIfExists('s_company');
    }
}
