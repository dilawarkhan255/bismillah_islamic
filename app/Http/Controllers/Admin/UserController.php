<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\AdminPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('roles');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->role($request->role);
        }

        $users = $query->latest()->paginate(10);
        $roles = Role::all();

        return view('admin.pages.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|string|exists:roles,name',
        ]);

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        if ($error = $this->roleChangeError($user, $validated['role'])) {
            return back()->with('error', $error);
        }

        $user->update($data);
        $user->syncRoles([$validated['role']]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($this->isLastAdmin($user)) {
            return back()->with('error', 'This is the only admin. Make someone else admin first.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|string|exists:roles,name']);

        if ($error = $this->roleChangeError($user, $request->role)) {
            return $request->wantsJson()
                ? response()->json(['success' => false, 'message' => $error], 422)
                : back()->with('error', $error);
        }

        $user->syncRoles([$request->role]);

        return $request->wantsJson()
            ? response()->json(['success' => true, 'message' => 'Role updated.'])
            : back()->with('success', "{$user->name} is now " . ucfirst($request->role) . '.');
    }

    /** Stops an admin locking themselves (or everyone) out of the admin panel. */
    private function roleChangeError(User $user, string $newRole): ?string
    {
        if ($user->hasRole($newRole)) {
            return null;
        }

        if ($user->id === auth()->id()) {
            return 'You cannot change your own role. Ask another admin.';
        }

        if ($newRole !== AdminPermissions::ADMIN_ROLE && $this->isLastAdmin($user)) {
            return 'This is the only admin. Make someone else admin first.';
        }

        return null;
    }

    private function isLastAdmin(User $user): bool
    {
        return $user->hasRole(AdminPermissions::ADMIN_ROLE)
            && User::role(AdminPermissions::ADMIN_ROLE)->count() <= 1;
    }

    public function getNotifications()
    {
        $notifications = auth()->user()->unreadNotifications()->limit(10)->get()
            ->map(fn ($n) => [
                'message'    => $n->data['message'] ?? ($n->data['title'] ?? 'New notification'),
                'url'        => $n->data['url'] ?? '#',
                'created_at' => $n->created_at?->diffForHumans(),
            ]);

        return response()->json(['notifications' => $notifications]);
    }

    public function markNotificationsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    }
}
