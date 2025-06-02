<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('watchlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('film_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['plan_to_watch', 'watching', 'completed'])->default('plan_to_watch');
            $table->timestamp('added_at')->useCurrent();
            $table->timestamps();
            
            // Ensure a film can only be in a user's watchlist once
            $table->unique(['user_id', 'film_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('watchlists');
    }
}; 