@extends('admin.layouts.app')

@section('title', 'Courses')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-book"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Courses</h1>
      <p class="text-muted mb-0">View and manage your courses.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addCourseModal')"><i class="bi bi-plus-lg"></i> Add Course</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-book"></i><span>All Courses</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="coursesTable">
      <thead>
        <tr>
          <th style="width:60px">Image</th>
          <th>Title</th>
          <th>Level</th>
          <th>Duration</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($courses as $course)
          <tr>
            <td>
              @if($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="product-thumb">
              @else
                <div class="product-thumb d-flex align-items-center justify-content-center" style="background:var(--admin-surface-soft);">
                  <i class="bi bi-book" style="color:var(--admin-muted);"></i>
                </div>
              @endif
            </td>
            <td>
              <strong>{{ $course->title }}</strong>
              @if($course->badge)
                <br><small class="text-muted">{{ $course->badge }}</small>
              @endif
            </td>
            <td><span class="badge" style="background:rgba(13,110,253,.12);color:#0d6efd;">{{ $course->level ?? 'N/A' }}</span></td>
            <td>{{ $course->duration ?? 'N/A' }}</td>
            <td>
              @if($course->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $course->id }}').submit()"><i class="bi bi-trash"></i></button>
                <form id="deleteForm{{ $course->id }}" action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:none;">
                  @csrf @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-muted py-4">No courses found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addCourseModal" title="Add New Course" size="lg">
  <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-8 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Title</label>
        <input type="text" name="title" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Icon</label>
        <input type="text" name="icon" class="form-control" placeholder="e.g. bi-book">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Description</label>
      <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Badge</label>
        <input type="text" name="badge" class="form-control" placeholder="e.g. Popular, New">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Duration</label>
        <input type="text" name="duration" class="form-control" placeholder="e.g. 12 weeks">
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Level</label>
        <input type="text" name="level" class="form-control" placeholder="e.g. Beginner, Intermediate">
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="0" min="0">
      </div>
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
      <label class="form-check-label">Active</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Course</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#coursesTable'); });
</script>
@endpush
