@extends('admin.layouts.app')

@section('title', 'Add Teacher')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-person-badge"></i></span>
    <div>
      <p class="eyebrow mb-1">Teachers</p>
      <h1 class="h3 mb-1">Add Teacher</h1>
      <p class="text-muted mb-0">Create a new teacher profile.</p>
    </div>
  </div>
</div>

<div class="panel">
  <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
        @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="role" class="form-label fw-bold">Role <span class="text-danger">*</span></label>
        <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
        @error('role')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="email" class="form-label fw-bold">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="phone" class="form-label fw-bold">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
        @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="mb-4">
      <label for="bio" class="form-label fw-bold">Bio</label>
      <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio') }}</textarea>
      @error('bio')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-4">
      <label for="qualifications" class="form-label fw-bold">Qualifications</label>
      <textarea name="qualifications" id="qualifications" class="form-control @error('qualifications') is-invalid @enderror" rows="3">{{ old('qualifications') }}</textarea>
      @error('qualifications')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-4">
      <label for="image" class="form-label fw-bold">Image</label>
      <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <h5 class="mb-3">Social Links</h5>
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="facebook_url" class="form-label fw-bold">Facebook URL</label>
        <input type="url" name="facebook_url" id="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url') }}">
        @error('facebook_url')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="twitter_url" class="form-label fw-bold">Twitter URL</label>
        <input type="url" name="twitter_url" id="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url') }}">
        @error('twitter_url')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="instagram_url" class="form-label fw-bold">Instagram URL</label>
        <input type="url" name="instagram_url" id="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url') }}">
        @error('instagram_url')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="linkedin_url" class="form-label fw-bold">LinkedIn URL</label>
        <input type="url" name="linkedin_url" id="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url') }}">
        @error('linkedin_url')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="sort_order" class="form-label fw-bold">Sort Order</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', 0) }}">
        @error('sort_order')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 d-flex align-items-end">
        <div class="form-check">
          <input type="hidden" name="is_active" value="0">
          <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
          <label class="form-check-label fw-bold" for="is_active">Active</label>
        </div>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Create Teacher</button>
      <a href="{{ route('admin.teachers.index') }}" class="btn btn-light">Cancel</a>
    </div>
  </form>
</div>
@endsection
