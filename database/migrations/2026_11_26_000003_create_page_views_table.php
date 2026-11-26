<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Admin > Visitors. One row per page a visitor opens. No IP address, name or
 * cookie is stored: visitor_hash is a one-way code that changes every day, so the
 * same person counts once per day but can never be identified or followed.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->char('visitor_hash', 64);
            $table->string('path', 255);
            $table->string('source', 30)->nullable();    // Google, Facebook, WhatsApp, Direct … (first page of a visit only)
            $table->string('referrer_host', 120)->nullable();
            $table->string('country', 60)->nullable();   // from the browser's timezone
            $table->string('device', 10);                // mobile | tablet | desktop
            $table->timestamp('created_at')->useCurrent();

            $table->index('created_at');
            $table->index(['visitor_hash', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
