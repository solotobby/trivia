<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->bigInteger('number_of_question');
            $table->string('time_allowed');
            $table->bigInteger('number_of_players');
            $table->bigInteger('number_of_game_played')->default(0);
            $table->boolean('game_paid')->default(false);
            $table->integer('coin_per_play')->nullable();
            $table->text('description');
            $table->boolean('question_bank')->default(false);
            $table->string('status')->default('PENDING');
            $table->string('_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
