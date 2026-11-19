<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\AdminPermissions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->withCount('users')->orderBy('id')->get();

        return view('admin.pages.roles.index', [
            'roles' => $roles,
            'groups' => AdminPermissions::GROUPS,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40', 'regex:/^[a-z0-9 _-]+$/i', Rule::unique('roles', 'name')],
        ], ['name.regex' => 'Use letters, numbers, spaces, - or _ only.']);

        Role::create(['name' => strtolower(trim($validated['name'])), 'guard_name' => 'web']);

        return redirect()->route('admin.roles.index')->with('success', 'Role created. Now tick what it can access and save.');
    }

    /** Saves the whole checkbox grid at once. The admin role is never changed here. */
    public function updatePermissions(Request $request)
    {
        $validated = $request->validate([
            'permissions' => ['array'],
            'permissions.*' => ['array'],
            'permissions.*.*' => ['string', Rule::in(AdminPermissions::all())],
        ]);
        $grid = $validated['permissions'] ?? [];

        foreach (Role::where('name', '!=', AdminPermissions::ADMIN_ROLE)->get() as $role) {
            $role->syncPermissions($grid[$role->id] ?? []);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()->route('admin.roles.index')->with('success', 'Permissions saved.');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->name, AdminPermissions::PROTECTED_ROLES, true)) {
            return back()->with('error', "The {$role->name} role can't be deleted.");
        }

        if ($role->users()->exists()) {
            return back()->with('error', 'Move the users in this role to another role first.');
        }

        $role->delete();
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted.');
    }
}
