<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('free_trials', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('parent_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('age_range')->nullable();
            $table->string('course')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('teacher_gender')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('free_trials');
    }
};
