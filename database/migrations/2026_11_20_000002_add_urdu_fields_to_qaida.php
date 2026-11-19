<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('qaida_lessons', function (Blueprint $table) {
            $table->string('title_ur')->nullable()->after('title');          // e.g. مفردات
            $table->text('description_ur')->nullable()->after('description'); // ہدایات in Urdu
            $table->json('groups')->nullable()->after('description_ur');     // tajweed letter groups shown under the table
        });

        Schema::table('qaida_items', function (Blueprint $table) {
            $table->string('hint', 40)->nullable()->after('transliteration'); // small name above a letter, e.g. "با"
        });
    }

    public function down(): void
    {
        Schema::table('qaida_items', fn (Blueprint $table) => $table->dropColumn('hint'));
        Schema::table('qaida_lessons', fn (Blueprint $table) => $table->dropColumn(['title_ur', 'description_ur', 'groups']));
    }
};
