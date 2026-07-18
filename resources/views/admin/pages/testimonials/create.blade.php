@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add Testimonial</h4>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
                    @error('role') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-select">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                            </option>
                        @endfor
                    </select>
                    @error('rating') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Testimonial Text <span class="text-danger">*</span></label>
                <textarea name="text" id="text" class="form-control" rows="4" required>{{ old('text') }}</textarea>
                @error('text') <div class="text-danger small">{{ $message }}</div> @enderror
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
                    <i class="bi bi-check-lg"></i> Save Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection