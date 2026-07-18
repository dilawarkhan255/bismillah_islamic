@extends('admin.layouts.app')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Gallery Image</h4>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.gallery.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title) }}" required>
                    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $item->category) }}">
                    @error('category') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Current image" class="rounded" style="max-height:120px;">
                </div>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order) }}">
                    @error('sort_order') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Update Image
                </button>
            </div>
        </form>
    </div>
</div>
@endsection