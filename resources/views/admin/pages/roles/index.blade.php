@extends('admin.layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
<x-admin.page-header title="Roles & Permissions" icon="bi-shield-lock" eyebrow="Manage"
  subtitle="Choose which parts of the admin panel each role can open.">
  <button class="btn btn-primary" onclick="openModal('addRoleModal')"><i class="bi bi-plus-lg"></i> Add Role</button>
</x-admin.page-header>

<div class="perm-note mb-4">
  <i class="bi bi-info-circle"></i>
  <div>
    <strong>Admin</strong> always has full access, and only admins can manage users and roles.
    Give someone a role on the <a href="{{ route('admin.users.index') }}">Users</a> page.
  </div>
</div>

<form action="{{ route('admin.roles.permissions') }}" method="POST">
  @csrf
  @method('PUT')

  <div class="panel p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table align-middle mb-0 perm-table">
        <thead>
          <tr>
            <th style="min-width:240px;">Section</th>
            @foreach($roles as $role)
              <th class="text-center" style="min-width:120px;">
                <div class="perm-role">
                  <span>{{ ucfirst($role->name) }}</span>
                  <small>{{ $role->users_count }} {{ Str::plural('user', $role->users_count) }}</small>
                </div>
              </th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($groups as $groupName => $perms)
            <tr class="perm-group-row">
              <td colspan="{{ $roles->count() + 1 }}">{{ $groupName }}</td>
            </tr>
            @foreach($perms as $permission => [$label])
              <tr>
                <td>{{ $label }}</td>
                @foreach($roles as $role)
                  <td class="text-center">
                    @if($role->name === \App\Support\AdminPermissions::ADMIN_ROLE)
                      <i class="bi bi-check-circle-fill perm-locked" title="Admin always has access"></i>
                    @else
                      <input type="checkbox" class="form-check-input perm-check"
                             name="permissions[{{ $role->id }}][]" value="{{ $permission }}"
                             aria-label="{{ ucfirst($role->name) }}: {{ $label }}"
                             @checked($role->permissions->contains('name', $permission))>
                    @endif
                  </td>
                @endforeach
              </tr>
            @endforeach
          @endforeach
          <tr class="perm-group-row">
            <td colspan="{{ $roles->count() + 1 }}">Administration</td>
          </tr>
          <tr>
            <td>Users, roles &amp; permissions</td>
            @foreach($roles as $role)
              <td class="text-center">
                @if($role->name === \App\Support\AdminPermissions::ADMIN_ROLE)
                  <i class="bi bi-check-circle-fill perm-locked" title="Admin only"></i>
                @else
                  <i class="bi bi-dash-lg text-muted" title="Admin only"></i>
                @endif
              </td>
            @endforeach
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            @foreach($roles as $role)
              <td class="text-center">
                @unless(in_array($role->name, \App\Support\AdminPermissions::PROTECTED_ROLES, true))
                  <button type="button" class="btn btn-sm btn-action btn-action-delete"
                          onclick="confirmDeleteForm('deleteRole{{ $role->id }}', @js($role->name . ' role'))"
                          title="Delete role"><i class="bi bi-trash"></i></button>
                @endunless
              </td>
            @endforeach
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <div class="d-flex justify-content-end mt-3">
    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Permissions</button>
  </div>
</form>

{{-- Delete forms live outside the grid form (forms can't be nested) --}}
@foreach($roles as $role)
  @unless(in_array($role->name, \App\Support\AdminPermissions::PROTECTED_ROLES, true))
    <form id="deleteRole{{ $role->id }}" action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-none">
      @csrf @method('DELETE')
    </form>
  @endunless
@endforeach

<x-admin.modal id="addRoleModal" title="Add Role" size="sm">
  <form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Role name</label>
      <input type="text" name="name" class="form-control" placeholder="e.g. receptionist" maxlength="40" required value="{{ old('name') }}">
      <div class="form-text">Example: a "receptionist" role that only sees the Inbox.</div>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Create Role</button>
    </div>
  </form>
</x-admin.modal>
@endsection

@push('styles')
<style>
  .perm-note { display:flex; gap:.75rem; align-items:flex-start; padding:.9rem 1.1rem; border:1px solid var(--admin-border); border-radius:12px; background:rgba(174,130,37,.06); font-size:.9rem; }
  .perm-note > i { color:var(--admin-primary); font-size:1.15rem; }
  .perm-note a { color:var(--admin-primary); font-weight:700; }
  .perm-table td, .perm-table th { padding-left:1.1rem; padding-right:1.1rem; }
  .perm-table tbody td { padding-top:.7rem; padding-bottom:.7rem; min-width:0; }
  .perm-role span { display:block; color:var(--admin-text); font-size:.85rem; text-transform:none; letter-spacing:0; }
  .perm-role small { display:block; font-weight:600; text-transform:none; letter-spacing:0; }
  .perm-group-row td { background:var(--admin-head-bg); color:var(--admin-primary); font-size:.74rem; font-weight:800; text-transform:uppercase; letter-spacing:.06em; padding-top:.55rem !important; padding-bottom:.55rem !important; }
  .perm-check { width:1.25rem; height:1.25rem; cursor:pointer; }
  .perm-locked { color:var(--admin-success); font-size:1.1rem; }
  .perm-table tfoot td { border-bottom:0; padding-top:.75rem; padding-bottom:.75rem; }
</style>
@endpush

@if($errors->has('name'))
  @push('scripts')
  <script>document.addEventListener('DOMContentLoaded', function () { openModal('addRoleModal'); Swal.fire({icon:'error', title:'Role not created', text:@js($errors->first('name'))}); });</script>
  @endpush
@endif
