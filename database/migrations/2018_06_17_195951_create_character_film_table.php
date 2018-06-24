<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_film', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('film_id')->unsigned();
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_film');
    }
}
