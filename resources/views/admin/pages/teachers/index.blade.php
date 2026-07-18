@extends('admin.layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-person-badge"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Teachers</h1>
      <p class="text-muted mb-0">View and manage your teaching staff.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addTeacherModal')"><i class="bi bi-plus-lg"></i> Add Teacher</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-person-badge"></i><span>All Teachers</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="teachersTable">
      <thead>
        <tr>
          <th style="width:60px">Image</th>
          <th>Name</th>
          <th>Role</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($teachers as $teacher)
        <tr>
          <td>
            @if($teacher->image)
              <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}" class="product-thumb">
            @else
              <div class="product-thumb d-flex align-items-center justify-content-center" style="background:var(--admin-surface-soft);">
                <i class="bi bi-person" style="color:var(--admin-muted);"></i>
              </div>
            @endif
          </td>
          <td><strong>{{ $teacher->name }}</strong></td>
          <td>{{ $teacher->role }}</td>
          <td>
            @if($teacher->is_active)
              <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
            @else
              <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
            @endif
          </td>
          <td class="text-end">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
              <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $teacher->id }}').submit()"><i class="bi bi-trash"></i></button>
              <form id="deleteForm{{ $teacher->id }}" action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" style="display:none;">
                @csrf @method('DELETE')
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addTeacherModal" title="Add New Teacher" size="md">
  <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Role</label>
      <input type="text" name="role" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
      <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
      <label class="form-check-label">Active</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Teacher</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#teachersTable'); });
</script>
@endpush
