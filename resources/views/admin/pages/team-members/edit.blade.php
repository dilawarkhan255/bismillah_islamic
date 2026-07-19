@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-pencil"></i></span>
    <div>
      <p class="eyebrow mb-1">Edit</p>
      <h1 class="h3 mb-1">{{ $member->name }}</h1>
      <p class="text-muted mb-0">Update team member profile.</p>
    </div>
  </div>
  <div class="heading-actions">
    <a href="{{ route('admin.team-members.index') }}" class="btn btn-light"><i class="bi bi-arrow-left"></i> Back</a>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success py-2 px-3 mb-3" style="border-left:3px solid var(--admin-success);">
    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
  </div>
@endif

<div class="panel">
  <form action="{{ route('admin.team-members.update', $member) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Role / Designation *</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $member->role) }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Department</label>
            <input type="text" name="department" class="form-control" value="{{ old('department', $member->department) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Photo</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($member->image)
              <small class="text-muted">Current: {{ basename($member->image) }}</small>
            @endif
          </div>
          <div class="col-12">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Short Bio</label>
            <input type="text" name="short_bio" class="form-control" value="{{ old('short_bio', $member->short_bio) }}">
          </div>
          <div class="col-12">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Full Bio</label>
            <textarea name="bio" class="form-control" rows="4">{{ old('bio', $member->bio) }}</textarea>
          </div>
          <div class="col-12">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Qualifications</label>
            <textarea name="qualifications" class="form-control" rows="3">{{ old('qualifications', $member->qualifications) }}</textarea>
          </div>
          <div class="col-12">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Experience</label>
            <textarea name="experience" class="form-control" rows="3">{{ old('experience', $member->experience) }}</textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Facebook URL</label>
            <input type="url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $member->facebook_url) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Twitter URL</label>
            <input type="url" name="twitter_url" class="form-control" value="{{ old('twitter_url', $member->twitter_url) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Instagram URL</label>
            <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $member->instagram_url) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $member->linkedin_url) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $member->sort_order) }}">
          </div>
          <div class="col-md-6 d-flex align-items-end">
            <div class="form-check form-switch">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $member->is_active ? 'checked' : '' }}>
              <label class="form-check-label">Active</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="text-center mb-3">
          @if($member->image)
            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" style="width:160px;height:160px;object-fit:cover;border-radius:50%;border:3px solid var(--gold,#AE8225);">
          @else
            <div style="width:160px;height:160px;border-radius:50%;background:var(--admin-surface-soft);display:inline-grid;place-items:center;border:3px dashed var(--admin-border);">
              <i class="bi bi-person" style="font-size:48px;color:var(--admin-muted);"></i>
            </div>
          @endif
        </div>
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Update Member</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
