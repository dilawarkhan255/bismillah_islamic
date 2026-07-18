@extends('admin.layouts.app')

@section('title', 'Pricing Plans')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-tag"></i></span>
    <div>
      <p class="eyebrow mb-1">Manage</p>
      <h1 class="h3 mb-1">Pricing Plans</h1>
      <p class="text-muted mb-0">Configure your pricing tiers and features.</p>
    </div>
  </div>
  <div class="heading-actions">
    <button class="btn btn-primary" onclick="openModal('addPricingModal')"><i class="bi bi-plus-lg"></i> Add Plan</button>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <div>
      <h2 class="h5 mb-1 section-title"><i class="bi bi-tag"></i><span>All Plans</span></h2>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0" id="pricingTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>Badge</th>
          <th>Days/Week</th>
          <th>Classes/Month</th>
          <th>Certificate</th>
          <th>Popular</th>
          <th>Status</th>
          <th class="text-end" style="width:160px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($plans as $plan)
          <tr>
            <td>
              <strong>{{ $plan->name }}</strong>
              @if($plan->accent_color)
                <span class="d-inline-block ms-1 rounded" style="width:12px;height:12px;background:{{ $plan->accent_color }};vertical-align:middle;"></span>
              @endif
            </td>
            <td>
              @if($plan->badge)
                <span class="badge" style="background:rgba(99,102,241,.12);color:#6366f1;">{{ $plan->badge }}</span>
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td>{{ $plan->days_per_week ?? '-' }}</td>
            <td>{{ $plan->classes_per_month ?? '-' }}</td>
            <td>
              @if($plan->certificate)
                <i class="bi bi-check-circle-fill" style="color:var(--admin-success);"></i>
              @else
                <i class="bi bi-x-circle text-muted"></i>
              @endif
            </td>
            <td>
              @if($plan->is_popular)
                <span class="badge" style="background:rgba(234,179,8,.12);color:#b45309;">Popular</span>
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td>
              @if($plan->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Active</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.pricing.edit', $plan) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $plan->id }}').submit()"><i class="bi bi-trash"></i></button>
                <form id="deleteForm{{ $plan->id }}" action="{{ route('admin.pricing.destroy', $plan) }}" method="POST" style="display:none;">
                  @csrf @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted py-4">No pricing plans found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addPricingModal" title="Add New Pricing Plan" size="lg">
  <form action="{{ route('admin.pricing.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Badge</label>
        <input type="text" name="badge" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Accent Color</label>
        <input type="color" name="accent_color" class="form-control form-control-color" value="#6366f1">
      </div>
      <div class="col-md-3 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Days/Week</label>
        <input type="number" name="days_per_week" class="form-control" min="1" max="7">
      </div>
      <div class="col-md-3 mb-3">
        <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Classes/Month</label>
        <input type="number" name="classes_per_month" class="form-control" min="0">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold" style="font-size:0.85rem;color:var(--admin-muted);">Features (one per line)</label>
      <textarea name="features" class="form-control" rows="4" placeholder="Enter each feature on a new line"></textarea>
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="certificate" value="0">
      <input type="checkbox" name="certificate" value="1" class="form-check-input">
      <label class="form-check-label">Includes Certificate</label>
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_popular" value="0">
      <input type="checkbox" name="is_popular" value="1" class="form-check-input">
      <label class="form-check-label">Mark as Popular</label>
    </div>
    <div class="mb-3 form-check form-switch">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
      <label class="form-check-label">Active</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save Plan</button>
    </div>
  </form>
</x-admin.modal>

@endsection

@push('scripts')
<script>
$(function() { initDatatables('#pricingTable'); });
</script>
@endpush
