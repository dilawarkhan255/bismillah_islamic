@extends('admin.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-person"></i></span>
    <div>
      <p class="eyebrow mb-1">Account</p>
      <h1 class="h3 mb-1">My Profile</h1>
      <p class="text-muted mb-0">Manage your account information.</p>
    </div>
  </div>
</div>

<div class="row g-4">
  <div class="col-lg-7">
    <div class="panel">
      <div class="panel-header mb-3">
        <h5 class="fw-bold mb-0">Profile Information</h5>
      </div>
      <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="mb-3">
          <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
          @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
          @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="panel">
      <div class="panel-header mb-3">
        <h5 class="fw-bold mb-0">Update Password</h5>
      </div>
      <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Current Password</label>
          <input type="password" name="current_password" class="form-control" autocomplete="current-password">
          @error('current_password', 'updatePassword') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">New Password</label>
          <input type="password" name="password" class="form-control" autocomplete="new-password">
          @error('password', 'updatePassword') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
      </form>
    </div>
  </div>
</div>
@endsection
