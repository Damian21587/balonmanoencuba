<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('players_titles');
    }
}
