<?php

namespace Database\Seeders;

use App\Support\AdminPermissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

/**
 * Creates roles + permissions. Safe to run again: it only adds what's missing and
 * never removes permissions an admin has changed on the Roles & Permissions page.
 */
class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (AdminPermissions::all() as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        // Admin: gets everything automatically (Gate::before), but assign anyway so the grid is accurate.
        Role::firstOrCreate(['name' => AdminPermissions::ADMIN_ROLE, 'guard_name' => 'web'])
            ->syncPermissions(AdminPermissions::all());

        // Editor: website content by default — only on first setup.
        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        if ($editor->permissions()->doesntExist()) {
            $editor->givePermissionTo(AdminPermissions::EDITOR_DEFAULTS);
        }

        // Plain website user: no admin-panel access.
        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
