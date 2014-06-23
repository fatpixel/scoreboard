<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScoresTable extends Migration
{

    public function up()
    {
        Schema::create(
            'scores',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('player_id')->unsigned();
                $table->integer('points')->unsigned()->default('5');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::drop('scores');
    }
}
