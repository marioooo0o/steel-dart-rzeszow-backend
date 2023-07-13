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
        Schema::create('fast_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fast_out_type_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('game_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fast_outs');
    }
};
