@extends('admin.layouts.app')

@section('title', 'Add Hero Slide')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add Hero Slide</h4>
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="badge" class="form-label">Badge</label>
                    <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge') }}">
                    @error('badge') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}">
                @error('subtitle') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="btn1_text" class="form-label">Button 1 Text</label>
                    <input type="text" name="btn1_text" id="btn1_text" class="form-control" value="{{ old('btn1_text') }}">
                    @error('btn1_text') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="btn1_url" class="form-label">Button 1 URL</label>
                    <input type="text" name="btn1_url" id="btn1_url" class="form-control" value="{{ old('btn1_url') }}">
                    @error('btn1_url') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="btn2_text" class="form-label">Button 2 Text</label>
                    <input type="text" name="btn2_text" id="btn2_text" class="form-control" value="{{ old('btn2_text') }}">
                    @error('btn2_text') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="btn2_url" class="form-label">Button 2 URL</label>
                    <input type="text" name="btn2_url" id="btn2_url" class="form-control" value="{{ old('btn2_url') }}">
                    @error('btn2_url') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    @error('sort_order') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Save Slide
                </button>
            </div>
        </form>
    </div>
</div>
@endsection