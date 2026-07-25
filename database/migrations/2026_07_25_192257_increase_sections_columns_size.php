<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->string('page_name', 100)->change();
            $table->string('section_key', 100)->change();
            $table->text('title')->nullable()->change();
            $table->text('subtitle')->nullable()->change();
            $table->text('button_text')->nullable()->change();
            $table->text('button_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->string('page_name')->change();
            $table->string('section_key')->change();
            $table->string('title')->nullable()->change();
            $table->string('subtitle')->nullable()->change();
            $table->string('button_text')->nullable()->change();
            $table->string('button_url')->nullable()->change();
        });
    }
};
