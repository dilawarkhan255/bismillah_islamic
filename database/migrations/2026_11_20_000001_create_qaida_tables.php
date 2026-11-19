<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // One row per takhti (lesson) of the Norani Qaida
        Schema::create('qaida_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('number');          // Takhti 1, 2, 3 ...
            $table->string('title');                         // e.g. "Huroof-e-Mufradat"
            $table->string('subtitle')->nullable();          // e.g. "Single letters"
            $table->string('slug')->unique();
            $table->text('description')->nullable();         // how to read this lesson
            $table->string('audio')->nullable();             // optional recording of the whole takhti
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });

        // One row per letter / line inside a takhti, each with its own optional recording
        Schema::create('qaida_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qaida_lesson_id')->constrained('qaida_lessons')->cascadeOnDelete();
            $table->string('text');                          // Arabic, e.g. "بَ بِ بُ"
            $table->string('transliteration')->nullable();   // e.g. "ba bi bu"
            $table->string('audio')->nullable();             // storage path of the teacher's recording
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['qaida_lesson_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qaida_items');
        Schema::dropIfExists('qaida_lessons');
    }
};
