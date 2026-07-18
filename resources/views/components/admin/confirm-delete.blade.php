@props(['id' => 'deleteModal', 'title' => 'Confirm Delete', 'message' => 'Are you sure you want to delete this item? This action cannot be undone.', 'action' => '#'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" style="padding:2rem 1.25rem;">
        <div style="width:60px;height:60px;margin:0 auto 1rem;border-radius:50%;background:rgba(220,38,38,.1);display:grid;place-items:center;">
          <i class="bi bi-exclamation-triangle" style="font-size:28px;color:var(--admin-danger);"></i>
        </div>
        <h6 class="fw-bold mb-2">{{ $title }}</h6>
        <p style="font-size:13px;color:var(--admin-muted);margin-bottom:1.25rem;">{{ $message }}</p>
        <form method="POST" action="{{ $action }}">
          @csrf
          @method('DELETE')
          <div style="display:flex;gap:8px;justify-content:center;">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="font-size:13px;">Cancel</button>
            <button type="submit" class="btn" style="background:var(--admin-danger);color:#fff;font-size:13px;">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
