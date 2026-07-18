@extends('admin.layouts.app')

@section('title', 'Add Pricing Plan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add Pricing Plan</h4>
    <a href="{{ route('admin.pricing.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="panel">
    <div class="panel-body">
        <form action="{{ route('admin.pricing.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="badge" class="form-label">Badge</label>
                    <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge') }}">
                    @error('badge') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="accent_color" class="form-label">Accent Color</label>
                    <input type="color" name="accent_color" id="accent_color" class="form-control form-control-color" value="{{ old('accent_color', '#4e73df') }}">
                    @error('accent_color') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="days_per_week" class="form-label">Days/Week</label>
                    <input type="text" name="days_per_week" id="days_per_week" class="form-control" value="{{ old('days_per_week') }}">
                    @error('days_per_week') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="classes_per_month" class="form-label">Classes/Month</label>
                    <input type="text" name="classes_per_month" id="classes_per_month" class="form-control" value="{{ old('classes_per_month') }}">
                    @error('classes_per_month') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="courses_count" class="form-label">Courses Count</label>
                    <input type="text" name="courses_count" id="courses_count" class="form-control" value="{{ old('courses_count') }}">
                    @error('courses_count') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="report_frequency" class="form-label">Report Frequency</label>
                    <input type="text" name="report_frequency" id="report_frequency" class="form-control" value="{{ old('report_frequency') }}">
                    @error('report_frequency') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3 d-flex align-items-end gap-3">
                    <div class="form-check">
                        <input type="checkbox" name="certificate" id="certificate" class="form-check-input" value="1" {{ old('certificate') ? 'checked' : '' }}>
                        <label class="form-check-label" for="certificate">Certificate</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_popular" id="is_popular" class="form-check-input" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_popular">Popular</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Features</label>
                <div id="features-container">
                    @if(old('features'))
                        @foreach(old('features') as $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="{{ $feature }}" placeholder="Feature">
                                <button type="button" class="btn btn-outline-danger remove-feature"><i class="bi bi-x"></i></button>
                            </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2">
                            <input type="text" name="features[]" class="form-control" placeholder="Feature">
                            <button type="button" class="btn btn-outline-danger remove-feature"><i class="bi bi-x"></i></button>
                        </div>
                    @endif
                </div>
                <button type="button" id="add-feature" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-plus"></i> Add Feature
                </button>
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
                    <i class="bi bi-check-lg"></i> Save Plan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        var container = document.getElementById('features-container');
        var div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = '<input type="text" name="features[]" class="form-control" placeholder="Feature"><button type="button" class="btn btn-outline-danger remove-feature"><i class="bi bi-x"></i></button>';
        container.appendChild(div);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            var container = document.getElementById('features-container');
            if (container.children.length > 1) {
                e.target.closest('.input-group').remove();
            }
        }
    });
</script>
@endpush
@endsection