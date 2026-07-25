@extends('admin.layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-journal-richtext"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Blog Posts</h1>
      <p class="text-muted mb-0">Create and manage your blog content.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addBlogModal')"><i class="bi bi-plus-lg"></i> Add Post</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-journal-richtext"></i><span>All Posts</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="blogTable">
      <thead>
        <tr>
          <th style="width:60px">Image</th>
          <th>Title</th>
          <th>Category</th>
          <th>Author</th>
          <th>Date</th>
          <th>Featured</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>
              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="product-thumb">
              @else
                <div class="product-thumb d-flex align-items-center justify-content-center" style="background:var(--admin-surface-soft);">
                  <i class="bi bi-image" style="color:var(--admin-muted);"></i>
                </div>
              @endif
            </td>
            <td><strong>{{ $post->title }}</strong></td>
            <td>
              @if($post->category)
                <span class="badge" style="background-color: {{ $post->category->color ?? '#6c757d' }}; color: #fff;">{{ $post->category->name }}</span>
              @else
                <span class="text-muted">Uncategorized</span>
              @endif
            </td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</td>
            <td>
              @if($post->is_featured)
                <span class="badge" style="background:rgba(234,179,8,.12);color:#b45309;">Featured</span>
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td>
              @if($post->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $post->id }}').submit()"><i class="bi bi-trash"></i></button>
                <form id="deleteForm{{ $post->id }}" action="{{ route('admin.blog.destroy', $post) }}" method="POST" style="display:none;">
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

<x-admin.modal id="addBlogModal" title="Add New Blog Post" size="lg">
  <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Slug</label>
      <input type="text" name="slug" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Content</label>
      <textarea name="content" class="form-control" rows="6" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Category</label>
      <select name="category_id" class="form-select">
        <option value="">Select Category</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
      <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_published" value="0">
      <input type="checkbox" name="is_published" value="1" class="form-check-input" checked>
      <label class="form-check-label">Published</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Post</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#blogTable'); });
</script>
@endpush
