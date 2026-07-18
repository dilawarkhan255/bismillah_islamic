@props(['id', 'title' => '', 'size' => 'md'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-{{ $size }} modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:1px solid var(--admin-border);padding:1rem 1.25rem;">
        <h5 class="modal-title fw-bold" id="{{ $id }}Label">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding:1.25rem;">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
