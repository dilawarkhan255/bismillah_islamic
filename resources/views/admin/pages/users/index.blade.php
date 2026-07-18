@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-people"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Users</h1>
      <p class="text-muted mb-0">Manage user accounts and roles.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addUserModal')"><i class="bi bi-plus-lg"></i> Add User</button>
  </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="h5 mb-1 section-title"><i class="bi bi-people"></i><span>All Users</span></h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0" id="usersTable">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th class="text-end" style="width:160px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:42px;height:42px;background:var(--admin-surface-soft);color:var(--admin-primary);font-weight:700;">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                    class="rounded-circle" style="width:42px;height:42px;object-fit:cover;">
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif
                        </div>
                    </td>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @php
                            $userRole = $user->getRoleNames()->first() ?? 'user';
                            $roleStyle = 'background:rgba(108,117,125,.12);color:#6c757d;';
                            if ($userRole === 'admin') $roleStyle = 'background:rgba(220,38,38,.12);color:var(--admin-danger);';
                            elseif ($userRole === 'editor') $roleStyle = 'background:rgba(174,130,37,.12);color:#AE8225;';
                        @endphp
                        <span class="badge rounded-pill px-3 py-2" style="font-size:0.78rem;font-weight:500;{{ $roleStyle }}">
                            {{ ucfirst($userRole) }}
                        </span>
                    </td>
                    <td>
                        <span class="text-muted" style="font-size:0.9rem;">{{ $user->created_at->format('M d, Y') }}</span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('admin.users.role', $user) }}" method="POST" class="d-inline">
                                @csrf @method('PATCH')
                                <select name="role" class="form-select form-select-sm" style="width:auto;font-size:12px;" onchange="this.form.submit()">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ ($user->getRoleNames()->first() ?? '') === $role->name ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $user->id }}').submit()"><i class="bi bi-trash"></i></button>
                        </div>
                        <form id="deleteForm{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<x-admin.modal id="addUserModal" title="Add New User" size="md">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Role</label>
            <select name="role_id" class="form-select" required>
                <option value="">Select a role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save User</button>
        </div>
    </form>
</x-admin.modal>
@endsection

@push('scripts')
<script>
$(function() { initDatatables('#usersTable'); });
</script>
@endpush
