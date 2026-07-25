@extends('admin.layouts.app')

@section('title', 'Blog Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Blog Categories</h4>
    <button class="btn btn-primary" onclick="openModal('addCategoryModal')">
        <i class="bi bi-plus-lg me-1"></i> Add Category
    </button>
</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="categoriesTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Color</th>
                        <th>Posts</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td><strong>{{ $category->name }}</strong></td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>
                                @if($category->color)
                                    <span class="d-inline-block rounded" style="width:24px;height:24px;background-color:{{ $category->color }};vertical-align:middle;border:1px solid #dee2e6;"></span>
                                    <small class="text-muted ms-1">{{ $category->color }}</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td><span class="badge" style="background:rgba(108,117,125,.12);color:#6c757d;">{{ $category->posts_count ?? $category->posts()->count() }}</span></td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
                                @else
                                    <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.blog-categories.edit', $category) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                                    <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $category->id }}').submit()"><i class="bi bi-trash"></i></button>
                                </div>
                                <form id="deleteForm{{ $category->id }}" action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" style="display:none;">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-admin.modal id="addCategoryModal" title="Add New Category" size="md">
    <form action="{{ route('admin.blog-categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
    </form>
</x-admin.modal>
@endsection

@push('scripts')
<script>
$(function() { initDatatables('#categoriesTable'); });
</script>
@endpush
