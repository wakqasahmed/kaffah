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
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('surah_id')->constrained()->cascadeOnDelete();
            $table->decimal('mastery_percentage', 5, 2)->default(0);
            $table->integer('total_attempts')->unsigned()->default(0);
            $table->decimal('best_score', 7, 2)->default(0);
            $table->integer('current_streak')->unsigned()->default(0);
            $table->integer('longest_streak')->unsigned()->default(0);
            $table->timestamp('last_attempted_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'surah_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};
