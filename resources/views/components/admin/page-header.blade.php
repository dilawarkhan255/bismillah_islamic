@props([
    'title',
    'icon' => 'bi-grid',
    'eyebrow' => 'Manage',
    'subtitle' => null,
    'back' => null,   // URL for a "Back" button
])

<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi {{ $icon }}"></i></span>
    <div>
      <p class="eyebrow mb-1">{{ $eyebrow }}</p>
      <h1 class="h3 mb-1">{{ $title }}</h1>
      @if($subtitle)
        <p class="text-muted mb-0">{{ $subtitle }}</p>
      @endif
    </div>
  </div>
  @if($back || trim($slot) !== '')
    <div class="heading-actions">
      {{ $slot }}
      @if($back)
        <a href="{{ $back }}" class="btn btn-light"><i class="bi bi-arrow-left"></i> Back</a>
      @endif
    </div>
  @endif
</div>
