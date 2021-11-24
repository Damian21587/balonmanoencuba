<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('measure')->default(0.0);
            $table->double('weigth')->default(0.0);
            $table->enum('years_experience',['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'
                , '11', '12', '13', '14', '15', '16', '17', '18', '19', '20']);
            $table->longText('about_player');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces');
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('players');
    }
}
