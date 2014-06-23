<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayersTable extends Migration
{

    public function up()
    {
        Schema::create(
            'players',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 128);
                $table->integer('highscore')->unsigned()->default(0);
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    public function down()
    {
        Schema::drop('players');
    }
}
