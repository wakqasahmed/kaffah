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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verse_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('action_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->tinyInteger('difficulty_level')->unsigned()->default(1);
            $table->text('question_text');
            $table->json('question_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
