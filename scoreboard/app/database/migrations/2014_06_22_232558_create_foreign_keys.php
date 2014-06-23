<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table(
            'scores',
            function (Blueprint $table) {
                $table->foreign('player_id')->references('id')->on('players')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            }
        );
    }

    public function down()
    {
        Schema::table(
            'scores',
            function (Blueprint $table) {
                $table->dropForeign('scores_player_id_foreign');
            }
        );
    }
}
