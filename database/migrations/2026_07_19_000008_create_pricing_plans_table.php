<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('badge')->nullable();
            $table->string('accent_color')->nullable()->default('#AE8225');
            $table->string('days_per_week')->nullable();
            $table->string('classes_per_month')->nullable();
            $table->string('courses_count')->nullable();
            $table->string('report_frequency')->nullable();
            $table->boolean('certificate')->default(false);
            $table->json('features')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
