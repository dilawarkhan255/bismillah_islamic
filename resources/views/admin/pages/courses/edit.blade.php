@extends('admin.layouts.app')

@section('title', 'Edit Course')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Course</h4>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $course->title) }}" required>
                        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $course->description) }}</textarea>
                        @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if($course->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="rounded" width="120" height="80" style="object-fit:cover;">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="badge" class="form-label">Badge</label>
                            <input type="text" name="badge" id="badge" class="form-control @error('badge') is-invalid @enderror" value="{{ old('badge', $course->badge) }}">
                            @error('badge') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="badge_color" class="form-label">Badge Color</label>
                            <input type="text" name="badge_color" id="badge_color" class="form-control @error('badge_color') is-invalid @enderror" value="{{ old('badge_color', $course->badge_color) }}" placeholder="e.g. #ff0000 or bg-primary">
                            @error('badge_color') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <h6 class="mb-3">Features</h6>
                    @for($i = 0; $i < 4; $i++)
                        <div class="mb-3">
                            <label for="features_{{ $i }}" class="form-label">Feature {{ $i + 1 }}</label>
                            <input type="text" name="features[]" id="features_{{ $i }}" class="form-control" value="{{ old('features.' . $i, $course->features[$i] ?? '') }}">
                        </div>
                    @endfor
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $course->icon) }}" placeholder="e.g. bi-book">
                        @error('icon') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-select @error('level') is-invalid @enderror">
                            <option value="">Select Level</option>
                            @foreach(['Beginner', 'Intermediate', 'Advanced', 'All Levels'] as $level)
                                <option value="{{ $level }}" {{ old('level', $course->level) === $level ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        @error('level') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration', $course->duration) }}" placeholder="e.g. 12 weeks">
                        @error('duration') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $course->price) }}" step="0.01" min="0">
                        @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $course->sort_order) }}" min="0">
                        @error('sort_order') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i> Update Course
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
