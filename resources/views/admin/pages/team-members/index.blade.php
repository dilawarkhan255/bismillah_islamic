@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-people"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Team Members</h1>
      <p class="text-muted mb-0">View and manage your team members.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addMemberModal')"><i class="bi bi-plus-lg"></i> Add Member</button>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success py-2 px-3 mb-3" style="border-left:3px solid var(--admin-success);">
    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
  </div>
@endif

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-people"></i><span>All Team Members</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="teamMembersTable">
      <thead>
        <tr>
          <th style="width:60px">Image</th>
          <th>Name</th>
          <th>Role</th>
          <th>Department</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
        <tr>
          <td>
            @if($member->image)
              <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="product-thumb">
            @else
              <div class="product-thumb d-flex align-items-center justify-content-center" style="background:var(--admin-surface-soft);">
                <i class="bi bi-person" style="color:var(--admin-muted);"></i>
              </div>
            @endif
          </td>
          <td><strong>{{ $member->name }}</strong></td>
          <td>{{ $member->role }}</td>
          <td>{{ $member->department ?? '—' }}</td>
          <td>
            @if($member->is_active)
              <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
            @else
              <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
            @endif
          </td>
          <td class="text-end">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
              <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $member->id }}').submit()"><i class="bi bi-trash"></i></button>
              <form id="deleteForm{{ $member->id }}" action="{{ route('admin.team-members.destroy', $member) }}" method="POST" style="display:none;">
                @csrf @method('DELETE')
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addMemberModal" title="Add Team Member" size="lg">
  <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name *</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Role / Designation *</label>
        <input type="text" name="role" class="form-control" placeholder="e.g. Head of Department" required>
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Department</label>
        <input type="text" name="department" class="form-control" placeholder="e.g. Administration, Quran Dept">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Photo</label>
        <input type="file" name="image" class="form-control" accept="image/*">
      </div>
      <div class="col-12">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Short Bio</label>
        <input type="text" name="short_bio" class="form-control" placeholder="One-liner about the member (max 255 chars)">
      </div>
      <div class="col-12">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Full Bio</label>
        <textarea name="bio" class="form-control" rows="3" placeholder="Detailed bio / description"></textarea>
      </div>
      <div class="col-12">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Qualifications</label>
        <textarea name="qualifications" class="form-control" rows="2" placeholder="Education, certifications, etc."></textarea>
      </div>
      <div class="col-12">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Experience</label>
        <textarea name="experience" class="form-control" rows="2" placeholder="Work experience, years of service, etc."></textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Phone</label>
        <input type="text" name="phone" class="form-control">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Facebook URL</label>
        <input type="url" name="facebook_url" class="form-control" placeholder="https://facebook.com/...">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Twitter URL</label>
        <input type="url" name="twitter_url" class="form-control" placeholder="https://twitter.com/...">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Instagram URL</label>
        <input type="url" name="instagram_url" class="form-control" placeholder="https://instagram.com/...">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">LinkedIn URL</label>
        <input type="url" name="linkedin_url" class="form-control" placeholder="https://linkedin.com/in/...">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="0">
      </div>
      <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch">
          <input type="hidden" name="is_active" value="0">
          <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
          <label class="form-check-label">Active</label>
        </div>
      </div>
    </div>
    <div class="text-end mt-4">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Member</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#teamMembersTable'); });
</script>
@endpush
