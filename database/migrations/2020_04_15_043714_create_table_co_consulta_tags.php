<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoConsultaTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_consulta_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tags')->references('id')->on('co_tags');
            $table->foreignId('id_consulta')->references('id')->on('co_consulta');
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
        Schema::dropIfExists('co_consulta_tags');
    }
}
