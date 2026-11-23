@extends('admin.layouts.app')

@section('title', $student->exists ? $student->name : 'Add Student')

@section('content')
<x-admin.page-header :title="$student->exists ? $student->name : 'Add Student'" icon="bi-mortarboard" eyebrow="Students"
  :subtitle="$student->exists ? trim(($student->parent_name ? 'Parent: ' . $student->parent_name . ' · ' : '') . ($student->country ?: $student->timezone_label)) : 'Fill in the details, then add class times.'"
  :back="route('admin.students.index')">
  @if($student->exists)
    @if($student->whatsapp_url)
      <a href="{{ $student->whatsapp_url }}" target="_blank" rel="noopener" class="btn btn-light"><i class="bi bi-whatsapp" style="color:#25D366;"></i> WhatsApp</a>
    @endif
    <a href="{{ $student->progress_url }}" class="btn btn-light"><i class="bi bi-eye"></i> Parent page</a>
    <x-admin.delete-button :action="route('admin.students.destroy', $student)" :name="$student->name" label="Delete" />
  @endif
</x-admin.page-header>

@if(! $student->exists)
  <div class="panel" style="max-width:980px;">
    <div class="panel-body">@include('admin.pages.students._details-form')</div>
  </div>
@else
  @php
    $thisMonth = \Carbon\CarbonImmutable::now(\App\Support\Timezones::ACADEMY)->startOfMonth();
    $paidThisMonth = $student->paidFor($thisMonth);
    $activeClasses = $student->classes->where('status', 'active')->count();
  @endphp

  {{-- At a glance --}}
  <div class="st-glance mb-3">
    <div><span>Status</span>@include('admin.pages.students._status', ['status' => $student->status])</div>
    <div><span>Course</span><strong>{{ $student->course ?: '—' }}</strong></div>
    <div><span>Level</span><strong>{{ $student->current_level ?: '—' }}</strong> <small>{{ $student->progress_percent }}%</small></div>
    <div><span>Classes</span><strong>{{ $activeClasses }}</strong> <small>{{ $activeClasses === 1 ? 'class' : 'classes' }}</small></div>
    <div><span>{{ $thisMonth->format('F') }} fee</span>
      @if(! $student->fee_amount)<strong class="text-muted">Not set</strong>
      @elseif($paidThisMonth)<strong style="color:var(--admin-success);">Paid</strong>
      @else<strong style="color:var(--admin-danger);">Not paid</strong>@endif
    </div>
  </div>

  {{-- Tabs --}}
  <ul class="nav st-tabs mb-3" role="tablist">
    @foreach([
      'details' => ['bi-person', 'Details', null],
      'classes' => ['bi-calendar-week', 'Classes', $student->classes->count()],
      'progress' => ['bi-graph-up-arrow', 'Progress', $student->progress->count() ?: null],
      'fees' => ['bi-cash-coin', 'Fees', null],
      'certificates' => ['bi-award', 'Certificates', $student->certificates->count() ?: null],
    ] as $key => [$icon, $label, $count])
      <li class="nav-item" role="presentation">
        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $key }}" data-bs-toggle="tab" data-bs-target="#pane-{{ $key }}" data-hash="{{ $key }}" type="button" role="tab">
          <i class="bi {{ $icon }}"></i> {{ $label }} @if($count)<span class="st-count">{{ $count }}</span>@endif
        </button>
      </li>
    @endforeach
  </ul>

  <div class="tab-content">
    <div class="tab-pane fade show active" id="pane-details" role="tabpanel">
      <div class="panel">
        <div class="panel-body">@include('admin.pages.students._details-form')</div>
      </div>
    </div>
    <div class="tab-pane fade" id="pane-classes" role="tabpanel">@include('admin.pages.students._tab-classes')</div>
    <div class="tab-pane fade" id="pane-progress" role="tabpanel">@include('admin.pages.students._tab-progress')</div>
    <div class="tab-pane fade" id="pane-fees" role="tabpanel">@include('admin.pages.students._tab-fees', ['thisMonth' => $thisMonth, 'paidThisMonth' => $paidThisMonth])</div>
    <div class="tab-pane fade" id="pane-certificates" role="tabpanel">@include('admin.pages.students._tab-certificates')</div>
  </div>
@endif
@endsection

@push('styles')
<style>
  .st-glance { display:grid; grid-template-columns:repeat(auto-fit, minmax(150px, 1fr)); gap:.75rem; }
  .st-glance > div { padding:.75rem 1rem; border:1px solid var(--admin-border); border-radius:12px; background:var(--admin-surface); }
  .st-glance > div > span:first-child { display:block; font-size:.72rem; text-transform:uppercase; letter-spacing:.06em; color:var(--admin-muted); margin-bottom:.2rem; }
  .st-glance strong { color:var(--admin-text); }
  .st-glance small { color:var(--admin-muted); }
  .st-tabs { gap:.35rem; border-bottom:1px solid var(--admin-border); flex-wrap:nowrap; overflow-x:auto; }
  .st-tabs .nav-link { border:0; border-bottom:3px solid transparent; border-radius:0; color:var(--admin-muted); font-weight:700; padding:.75rem 1rem; white-space:nowrap; background:none; }
  .st-tabs .nav-link:hover { color:var(--admin-text); }
  .st-tabs .nav-link.active { color:var(--admin-primary); border-bottom-color:var(--admin-primary); }
  .st-count { display:inline-block; min-width:20px; padding:0 6px; margin-left:4px; border-radius:10px; background:rgba(174,130,37,.15); color:var(--admin-primary); font-size:.72rem; }
  .cls-row, .rec-row { display:flex; align-items:center; gap:.85rem; padding:.75rem 0; border-top:1px solid var(--admin-border); }
  .cls-row:first-child, .rec-row:first-child { border-top:0; padding-top:0; }
  .cls-time { min-width:92px; text-align:center; padding:.45rem .6rem; border-radius:10px; background:rgba(174,130,37,.1); }
  .cls-time strong { display:block; color:var(--admin-primary); }
  .cls-time small { color:var(--admin-muted); font-size:.72rem; }
  .rec-badge { font-size:.72rem; font-weight:700; padding:.3rem .55rem; border-radius:8px; white-space:nowrap; min-width:64px; text-align:center; }
  .rec-fee { display:flex; align-items:center; justify-content:space-between; gap:.75rem; padding:.9rem 1rem; border-radius:12px; border:1px solid rgba(220,38,38,.35); background:rgba(220,38,38,.06); }
  .rec-fee.is-paid { border-color:rgba(15,118,110,.35); background:rgba(15,118,110,.07); }
</style>
@endpush

@push('scripts')
<script>
  // Open the tab named in the URL (#classes, #fees …) and keep the URL in step,
  // so after saving the page comes back to the same tab.
  (function () {
    var open = function (hash) {
      var btn = document.querySelector('.st-tabs [data-hash="' + hash + '"]');
      if (btn) bootstrap.Tab.getOrCreateInstance(btn).show();
    };
    document.addEventListener('DOMContentLoaded', function () {
      if (location.hash) open(location.hash.slice(1));
      document.querySelectorAll('.st-tabs [data-hash]').forEach(function (btn) {
        btn.addEventListener('shown.bs.tab', function () { history.replaceState(null, '', '#' + btn.dataset.hash); });
      });
    });
  })();
</script>
@endpush
