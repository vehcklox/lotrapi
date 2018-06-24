<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_language');
    }
}
