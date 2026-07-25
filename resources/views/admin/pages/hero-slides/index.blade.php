@extends('admin.layouts.app')

@section('title', 'Hero Slides')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Hero Slides</h4>
    <button class="btn btn-primary" onclick="openModal('addSlideModal')">
        <i class="bi bi-plus-lg"></i> Add Slide
    </button>
</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="slidesTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Badge</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td>
                                @if($slide->image)
                                    <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="rounded" width="80" height="50" style="object-fit:cover;">
                                @else
                                    <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted" style="width:80px;height:50px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($slide->badge)
                                    <span class="badge" style="background:rgba(13,110,253,.12);color:#0d6efd;">{{ $slide->badge }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td><strong>{{ $slide->title }}</strong></td>
                            <td>
                                @if($slide->is_active)
                                    <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
                                @else
                                    <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                                    <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $slide->id }}').submit()"><i class="bi bi-trash"></i></button>
                                </div>
                                <form id="deleteForm{{ $slide->id }}" action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" style="display:none;">
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

<x-admin.modal id="addSlideModal" title="Add New Slide" size="md">
    <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Badge</label>
            <input type="text" name="badge" class="form-control" placeholder="e.g. New, Popular">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Button 1 Text</label>
                <input type="text" name="btn1_text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Button 1 URL</label>
                <input type="text" name="btn1_url" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Button 2 Text</label>
                <input type="text" name="btn2_text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Button 2 URL</label>
                <input type="text" name="btn2_url" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
        </div>
        <div class="mb-3 form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
            <label class="form-check-label">Active</label>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Slide</button>
        </div>
    </form>
</x-admin.modal>
@endsection

@push('scripts')
<script>
$(function() { initDatatables('#slidesTable'); });
</script>
@endpush
