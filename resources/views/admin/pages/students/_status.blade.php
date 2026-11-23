@php
  $styles = [
      'active' => 'background:rgba(15,118,110,.12);color:var(--admin-success);',
      'paused' => 'background:rgba(174,130,37,.12);color:#AE8225;',
      'left'   => 'background:rgba(108,117,125,.12);color:#6c757d;',
  ];
@endphp
<span class="badge" style="{{ $styles[$status] ?? $styles['left'] }}">{{ ucfirst($status) }}</span>
