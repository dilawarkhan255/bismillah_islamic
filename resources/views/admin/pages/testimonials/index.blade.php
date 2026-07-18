@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-chat-quote"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Testimonials</h1>
      <p class="text-muted mb-0">Manage student testimonials and reviews.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addTestimonialModal')"><i class="bi bi-plus-lg"></i> Add Testimonial</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-chat-quote"></i><span>All Testimonials</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="testimonialsTable">
      <thead>
        <tr>
          <th style="width:60px">Image</th>
          <th>Name</th>
          <th>Role</th>
          <th>Rating</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $testimonial)
          <tr>
            <td>
              @if($testimonial->image)
                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="product-thumb">
              @else
                <div class="product-thumb d-flex align-items-center justify-content-center" style="background:var(--admin-surface-soft);">
                  <i class="bi bi-person" style="color:var(--admin-muted);"></i>
                </div>
              @endif
            </td>
            <td><strong>{{ $testimonial->name }}</strong></td>
            <td>{{ $testimonial->role }}</td>
            <td>
              @for($i = 1; $i <= 5; $i++)
                @if($i <= $testimonial->rating)
                  <i class="bi bi-star-fill text-warning"></i>
                @else
                  <i class="bi bi-star text-muted"></i>
                @endif
              @endfor
            </td>
            <td>
              @if($testimonial->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $testimonial->id }}').submit()"><i class="bi bi-trash"></i></button>
                <form id="deleteForm{{ $testimonial->id }}" action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:none;">
                  @csrf @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-muted py-4">No testimonials found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addTestimonialModal" title="Add New Testimonial" size="md">
  <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Role</label>
      <input type="text" name="role" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Testimonial</label>
      <textarea name="text" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Rating</label>
      <select name="rating" class="form-select" required>
        <option value="5">5 - Excellent</option>
        <option value="4">4 - Very Good</option>
        <option value="3" selected>3 - Good</option>
        <option value="2">2 - Fair</option>
        <option value="1">1 - Poor</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Image</label>
      <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
      <label class="form-check-label">Active</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Testimonial</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#testimonialsTable'); });
</script>
@endpush
