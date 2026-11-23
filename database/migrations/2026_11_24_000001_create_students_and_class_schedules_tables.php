<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Admin > Students & Classes: replaces the hand-kept Excel sheet of
 * student / teacher / class time.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('parent_name')->nullable();
            $table->string('whatsapp', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('country', 60)->nullable();
            $table->string('timezone', 60)->default('Asia/Karachi');
            $table->string('course')->nullable();
            $table->string('status', 20)->default('active'); // active | paused | left
            $table->date('start_date')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('free_trial_id')->nullable()->constrained('free_trials')->nullOnDelete();
            $table->timestamps();

            $table->index('status');
        });

        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained()->nullOnDelete();
            $table->string('course')->nullable();
            $table->json('days');                       // ISO weekdays: 1 = Monday … 7 = Sunday
            $table->string('start_time', 5);            // "HH:MM", Pakistan time
            $table->unsignedSmallInteger('duration_minutes')->default(30);
            $table->string('status', 20)->default('active'); // active | paused
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['teacher_id', 'status']);
            $table->index('start_time');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
        Schema::dropIfExists('students');
    }
};
