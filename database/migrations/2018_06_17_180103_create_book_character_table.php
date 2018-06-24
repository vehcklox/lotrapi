<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_character', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_character');
    }
}
