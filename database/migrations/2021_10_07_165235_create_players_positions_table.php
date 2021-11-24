<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_positions', function (Blueprint $table) {
            $table->bigInteger('player_id')->unsigned()->index();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->bigInteger('position_id')->unsigned()->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->primary(['player_id', 'position_id']);
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
        Schema::dropIfExists('players_positions');
    }
}
