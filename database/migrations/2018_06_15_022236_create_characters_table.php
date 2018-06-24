<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('realm')->unsigned();
            $table->string('height');
            $table->string('hair_color');
            $table->string('eye_color');
            $table->string('date_of_birth');
            $table->string('date_of_death');
            $table->string('gender');
            $table->integer('species')->unsigned();
            $table->integer('race')->unsigned();
            $table->string('weapons');
            $table->integer('group')->unsigned();
            $table->timestamps();
        });

        Schema::table('characters', function($table) {
            $table->foreign('realm')->references('id')->on('realms');
            $table->foreign('species')->references('id')->on('species');
            $table->foreign('race')->references('id')->on('races');
            $table->foreign('group')->references('id')->on('character_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
