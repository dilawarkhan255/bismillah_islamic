<?php

use App\Models\SiteSetting;
use App\Support\ContentCache;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * The Norani Qaida page now shows only the uploaded PDF. The interactive
 * takhtiyan (lessons, lines and their audio) are removed.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('qaida_items');
        Schema::dropIfExists('qaida_lessons');
        SiteSetting::where('key', 'qaida_display')->delete();
        ContentCache::flush();
    }

    public function down(): void
    {
        // The takhtiyan feature is gone; restore it from git history if ever needed.
    }
};
