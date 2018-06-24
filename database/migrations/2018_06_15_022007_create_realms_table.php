<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('capital')->unsigned();
            $table->string('founded_date');
            $table->string('type');
            $table->string('location');
            $table->string('inhabitants');
            $table->timestamps();

            $table->foreign('capital')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realms');
    }
}
