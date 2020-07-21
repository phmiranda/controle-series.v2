<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('episodios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('temporada');
            $table->integer('numero');
            $table->boolean('assistido');
            $table->integer('serie_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('episodios');
    }
}
