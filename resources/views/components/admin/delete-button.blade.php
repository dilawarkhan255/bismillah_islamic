@props([
    'action',               // destroy route URL
    'name' => 'this item',  // shown in the confirmation popup
    'label' => null,        // text next to the icon; null = icon-only button
])

<form action="{{ $action }}" method="POST" class="d-inline js-confirm-delete" data-name="{{ $name }}">
  @csrf
  @method('DELETE')
  @if($label)
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-danger-soft']) }}>
      <i class="bi bi-trash"></i> {{ $label }}
    </button>
  @else
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-sm btn-action btn-action-delete']) }} title="Delete" aria-label="Delete {{ $name }}">
      <i class="bi bi-trash"></i>
    </button>
  @endif
</form>
