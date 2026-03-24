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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verse_id')->constrained()->cascadeOnDelete();
            $table->string('action_key');
            $table->text('arabic_fragment');
            $table->decimal('weightage', 3, 2)->default(1.00);
            $table->string('action_type');
            $table->string('obligation');
            $table->tinyInteger('implementation_level')->unsigned();
            $table->tinyInteger('difficulty_level')->unsigned();
            $table->string('classification');
            $table->string('jannah_category')->nullable();
            $table->string('jahannam_category')->nullable();
            $table->json('gender');
            $table->json('age_group');
            $table->string('frequency');
            $table->json('action_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
