@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-images"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Gallery</h1>
      <p class="text-muted mb-0">Manage your image gallery.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addGalleryModal')"><i class="bi bi-plus-lg"></i> Add Image</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-images"></i><span>All Images</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="galleryTable">
      <thead>
        <tr>
          <th style="width:80px">Image</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
          <tr>
            <td>
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="product-thumb">
            </td>
            <td><strong>{{ $item->title }}</strong></td>
            <td>
              @if($item->category)
                <span class="badge" style="background:rgba(99,102,241,.12);color:#6366f1;">{{ $item->category }}</span>
              @else
                <span class="text-muted">Uncategorized</span>
              @endif
            </td>
            <td>
              @if($item->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $item->id }}').submit()"><i class="bi bi-trash"></i></button>
                <form id="deleteForm{{ $item->id }}" action="{{ route('admin.gallery.destroy', $item) }}" method="POST" style="display:none;">
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

<x-admin.modal id="addGalleryModal" title="Add New Gallery Image" size="md">
  <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Category</label>
      <input type="text" name="category" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
      <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
      <label class="form-check-label">Active</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Image</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#galleryTable'); });
</script>
@endpush
