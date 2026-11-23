<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('qaida_lessons', function (Blueprint $table) {
            // earlier slugs of this takhti, so old links / Google results redirect (301) to the new URL
            $table->json('old_slugs')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('qaida_lessons', fn (Blueprint $table) => $table->dropColumn('old_slugs'));
    }
};
