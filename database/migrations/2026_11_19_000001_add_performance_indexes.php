<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Indexes matching the queries the site actually runs:
     * - active() scopes: WHERE is_active = 1 ORDER BY sort_order
     * - blog: WHERE is_active = 1 ORDER BY published_at DESC
     * - admin inbox lists: ORDER BY created_at DESC, filtered by status / is_read
     */
    private array $indexes = [
        'courses'         => [['is_active', 'sort_order']],
        'teachers'        => [['is_active', 'sort_order']],
        'testimonials'    => [['is_active', 'sort_order']],
        'hero_slides'     => [['is_active', 'sort_order']],
        'gallery_items'   => [['is_active', 'sort_order']],
        'pricing_plans'   => [['is_active', 'sort_order']],
        'team_members'    => [['is_active', 'sort_order']],
        'blog_categories' => [['is_active', 'sort_order']],
        'blog_posts'      => [['is_active', 'published_at']],
        'sections'        => [['page_name', 'sort_order']],
        'site_settings'   => [['group']],
        'enrollments'     => [['status'], ['created_at']],
        'free_trials'     => [['status'], ['created_at']],
        'messages'        => [['is_read'], ['created_at']],
    ];

    public function up(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            Schema::table($table, function (Blueprint $t) use ($indexes) {
                foreach ($indexes as $columns) {
                    $t->index($columns);
                }
            });
        }
    }

    public function down(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            Schema::table($table, function (Blueprint $t) use ($indexes) {
                foreach ($indexes as $columns) {
                    $t->dropIndex($columns);
                }
            });
        }
    }
};
