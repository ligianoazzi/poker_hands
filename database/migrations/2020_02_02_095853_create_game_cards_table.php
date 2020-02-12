<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedInteger('player');            
            $table->unsignedInteger('line');            
            $table->string('card_1')->nullable();
            $table->string('card_2')->nullable();
            $table->string('card_3')->nullable();
            $table->string('card_4')->nullable();
            $table->string('card_5')->nullable();
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
        Schema::dropIfExists('game_cards');
    }
}
