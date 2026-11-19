<?php

namespace App\Support;

use App\Models\User;

/**
 * Single source of truth for admin-panel permissions.
 *
 * - The seeder creates these permissions.
 * - Routes in routes/admin.php are protected with "permission:<name>".
 * - The Roles & Permissions page shows them as a checkbox grid.
 * - The "admin" role always has every permission (Gate::before in AppServiceProvider),
 *   and only admins can manage users and roles, so nobody can lock the site out.
 */
class AdminPermissions
{
    public const ADMIN_ROLE = 'admin';

    /** Roles that can't be deleted from the Roles page. */
    public const PROTECTED_ROLES = ['admin', 'editor'];

    /** group label => [permission => [label, admin home route]] */
    public const GROUPS = [
        'Website content' => [
            'manage courses'      => ['Courses', 'admin.courses.index'],
            'manage teachers'     => ['Teachers', 'admin.teachers.index'],
            'manage team members' => ['Team Members', 'admin.team-members.index'],
            'manage blog'         => ['Blog posts & categories', 'admin.blog.index'],
            'manage testimonials' => ['Testimonials', 'admin.testimonials.index'],
            'manage gallery'      => ['Gallery', 'admin.gallery.index'],
            'manage sections'     => ['Page blocks (Sections)', 'admin.sections.index'],
            'manage qaida'        => ['Norani Qaida lessons', 'admin.qaida.index'],
        ],
        'Site setup' => [
            'manage hero slides'   => ['Hero slides', 'admin.hero-slides.index'],
            'manage pricing'       => ['Pricing plans', 'admin.pricing.index'],
            'manage page content'  => ['Page content', 'admin.page-content.index'],
            'manage settings'      => ['Site settings (contact, logo, images)', 'admin.settings.index'],
        ],
        'Inbox' => [
            'manage enrollments' => ['Enrollments', 'admin.enrollments.index'],
            'manage free trials' => ['Free trial requests', 'admin.free-trials.index'],
            'manage messages'    => ['Contact messages', 'admin.messages.index'],
        ],
        'Overview' => [
            'view dashboard' => ['Dashboard & statistics', 'admin.dashboard'],
        ],
    ];

    /** What a brand-new "editor" role gets: website content only (same as before). */
    public const EDITOR_DEFAULTS = [
        'manage courses', 'manage teachers', 'manage team members', 'manage blog',
        'manage testimonials', 'manage gallery', 'manage sections', 'manage qaida',
    ];

    public const INBOX = ['manage enrollments', 'manage free trials', 'manage messages'];

    /** @return string[] every permission name */
    public static function all(): array
    {
        return array_merge(...array_map('array_keys', array_values(self::GROUPS)));
    }

    /** First admin page this user may open, or null if they have no admin access at all. */
    public static function homeUrlFor(User $user): ?string
    {
        if ($user->hasRole(self::ADMIN_ROLE)) {
            return route('admin.dashboard');
        }

        // Dashboard first, then the sidebar order.
        $ordered = ['view dashboard' => 'admin.dashboard'];
        foreach (self::GROUPS as $perms) {
            foreach ($perms as $name => [, $route]) {
                $ordered[$name] ??= $route;
            }
        }

        foreach ($ordered as $permission => $route) {
            if ($user->can($permission)) {
                return route($route);
            }
        }

        return null;
    }

    public static function canAccessPanel(User $user): bool
    {
        return $user->hasRole(self::ADMIN_ROLE) || $user->getAllPermissions()->isNotEmpty();
    }
}
