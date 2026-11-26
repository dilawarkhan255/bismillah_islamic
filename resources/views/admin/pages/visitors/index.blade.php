@extends('admin.layouts.app')

@section('title', 'Visitors')

@php
  $bar = function ($items) {
      $max = max(1, (int) collect($items)->max());
      return fn ($n) => max(2, round($n / $max * 100));
  };
  $pageNames = ['/' => 'Home', '/about' => 'About', '/courses' => 'Courses', '/norani-qaida' => 'Norani Qaida', '/gallery' => 'Gallery',
      '/team' => 'Our Teachers', '/our-team' => 'Our Team', '/contact' => 'Contact', '/free_trial' => 'Free Trial', '/pricing' => 'Pricing',
      '/blog' => 'Blog', '/privacy_policy' => 'Privacy Policy'];
  $flags = ['Pakistan' => '🇵🇰', 'United Kingdom' => '🇬🇧', 'USA' => '🇺🇸', 'Canada' => '🇨🇦', 'UAE' => '🇦🇪', 'Saudi Arabia' => '🇸🇦',
      'Qatar' => '🇶🇦', 'Kuwait' => '🇰🇼', 'Oman' => '🇴🇲', 'Bahrain' => '🇧🇭', 'Ireland' => '🇮🇪', 'Australia' => '🇦🇺', 'India' => '🇮🇳',
      'Bangladesh' => '🇧🇩', 'Malaysia' => '🇲🇾', 'Germany' => '🇩🇪', 'France' => '🇫🇷', 'Netherlands' => '🇳🇱', 'Belgium' => '🇧🇪',
      'Norway' => '🇳🇴', 'Sweden' => '🇸🇪', 'Denmark' => '🇩🇰', 'Spain' => '🇪🇸', 'Italy' => '🇮🇹', 'Turkey' => '🇹🇷', 'South Africa' => '🇿🇦',
      'Kenya' => '🇰🇪', 'Nigeria' => '🇳🇬', 'Egypt' => '🇪🇬', 'New Zealand' => '🇳🇿', 'Singapore' => '🇸🇬', 'Indonesia' => '🇮🇩', 'Brazil' => '🇧🇷'];
  $deviceIcons = ['mobile' => 'bi-phone', 'tablet' => 'bi-tablet', 'desktop' => 'bi-laptop'];
  $formsTotal = array_sum($forms);
@endphp

@section('content')
<x-admin.page-header title="Visitors" icon="bi-graph-up" eyebrow="Overview"
  subtitle="Who visits the website. No names, IP addresses or cookies are stored — only counts."></x-admin.page-header>

<div class="d-flex flex-wrap gap-2 mb-3">
  @foreach(\App\Http\Controllers\Admin\VisitorStatsController::RANGES as $key => $label)
    <a href="{{ route('admin.visitors.index', ['range' => $key]) }}" class="btn btn-sm {{ $range === (string) $key ? 'btn-primary' : 'btn-light' }}">{{ $label }}</a>
  @endforeach
</div>

<div class="row g-3 mb-4">
  @foreach([
    ['bi-people', 'Visitors', number_format($visitors), 'people (each counted once a day)'],
    ['bi-file-earmark-text', 'Pages viewed', number_format($views), $perVisitor . ' pages per visitor'],
    ['bi-calendar-check', 'Free trial page', number_format($trialPageVisitors), 'visitors opened it'],
    ['bi-send-check', 'Forms sent', number_format($formsTotal), collect($forms)->map(fn ($n, $k) => $n . ' ' . Str::lower($k))->implode(' · ')],
  ] as [$icon, $label, $value, $hint])
    <div class="col-6 col-xl-3">
      <div class="vs-tile">
        <span class="vs-ico"><i class="bi {{ $icon }}"></i></span>
        <span class="vs-label">{{ $label }}</span>
        <strong>{{ $value }}</strong>
        <small>{{ $hint }}</small>
      </div>
    </div>
  @endforeach
</div>

@if($days->isNotEmpty())
  @php $dayBar = $bar($days->pluck('visitors')); @endphp
  <div class="panel mb-4">
    <div class="panel-header"><h5 class="mb-0"><i class="bi bi-bar-chart"></i> Visitors {{ $range === '365' ? 'per month' : 'per day' }}</h5></div>
    <div class="panel-body">
      <div class="vs-chart">
        @foreach($days as $d)
          <div class="vs-col" title="{{ isset($d['month']) ? $d['date']->format('F Y') : $d['date']->format('D d M') }}: {{ $d['visitors'] }} visitors, {{ $d['views'] }} pages">
            <span class="vs-num">{{ $d['visitors'] ?: '' }}</span>
            <span class="vs-bar" style="height: {{ $d['visitors'] ? $dayBar($d['visitors']) : 0 }}%"></span>
            <span class="vs-day">{{ isset($d['month']) ? $d['date']->format('M') : ($days->count() > 31 ? ($d['date']->day === 1 ? $d['date']->format('M') : '') : $d['date']->format('j')) }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="row g-4">
  <div class="col-lg-6">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-file-earmark-richtext"></i> Most viewed pages</h5></div>
      <div class="panel-body">
        @php $pBar = $bar($pages->values()); @endphp
        @forelse($pages as $path => $n)
          <div class="vs-row">
            <span class="vs-name">{{ $pageNames[$path] ?? (Str::startsWith($path, '/blog/') ? 'Blog: ' . Str::headline(Str::after($path, '/blog/')) : $path) }}</span>
            <span class="vs-track"><span style="width: {{ $pBar($n) }}%"></span></span>
            <span class="vs-n">{{ number_format($n) }}</span>
          </div>
        @empty
          <p class="text-muted mb-0">No visits yet in this period.</p>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-globe2"></i> Countries</h5></div>
      <div class="panel-body">
        @php $cBar = $bar($countries->values()); @endphp
        @forelse($countries as $country => $n)
          <div class="vs-row">
            <span class="vs-name">{{ $flags[$country] ?? '🌐' }} {{ $country }}</span>
            <span class="vs-track"><span style="width: {{ $cBar($n) }}%"></span></span>
            <span class="vs-n">{{ number_format($n) }}</span>
          </div>
        @empty
          <p class="text-muted mb-0">No visits yet in this period.</p>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-signpost-split"></i> Where visitors came from</h5></div>
      <div class="panel-body">
        @php $sBar = $bar($sources->values()); @endphp
        @forelse($sources as $source => $n)
          <div class="vs-row">
            <span class="vs-name">{{ $source }}</span>
            <span class="vs-track"><span style="width: {{ $sBar($n) }}%"></span></span>
            <span class="vs-n">{{ number_format($n) }}</span>
          </div>
        @empty
          <p class="text-muted mb-0">No visits yet in this period.</p>
        @endforelse
        <p class="small text-muted mt-3 mb-0">"Direct" = typed the address, a bookmark, or a link from an app such as WhatsApp.</p>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-phone"></i> Devices</h5></div>
      <div class="panel-body">
        @php $total = max(1, $devices->sum()); @endphp
        @forelse($devices as $device => $n)
          <div class="vs-row">
            <span class="vs-name"><i class="bi {{ $deviceIcons[$device] ?? 'bi-display' }}"></i> {{ ucfirst($device) }}</span>
            <span class="vs-track"><span style="width: {{ round($n / $total * 100) }}%"></span></span>
            <span class="vs-n">{{ round($n / $total * 100) }}%</span>
          </div>
        @empty
          <p class="text-muted mb-0">No visits yet in this period.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .vs-tile { position:relative; padding:1rem 1.1rem; border:1px solid var(--admin-border); border-radius:12px; background:var(--admin-surface); height:100%; }
  .vs-ico { position:absolute; right:1rem; top:1rem; width:34px; height:34px; display:grid; place-items:center; border-radius:9px; background:rgba(174,130,37,.12); color:var(--admin-primary); }
  .vs-label { display:block; font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--admin-muted); }
  .vs-tile strong { display:block; font-size:1.8rem; line-height:1.2; color:var(--admin-text); }
  .vs-tile small { color:var(--admin-muted); }
  .vs-chart { display:flex; align-items:flex-end; gap:4px; height:220px; padding-top:18px; }
  .vs-col { flex:1; min-width:0; height:100%; display:flex; flex-direction:column; justify-content:flex-end; align-items:center; }
  .vs-bar { width:100%; max-width:34px; border-radius:5px 5px 0 0; background:linear-gradient(180deg, #D4A843, #AE8225); min-height:0; }
  .vs-num { font-size:.68rem; color:var(--admin-muted); margin-bottom:2px; }
  .vs-day { font-size:.68rem; color:var(--admin-muted); margin-top:6px; height:14px; white-space:nowrap; }
  .vs-row { display:grid; grid-template-columns:minmax(110px, 38%) 1fr 54px; align-items:center; gap:10px; padding:.45rem 0; }
  .vs-name { overflow:hidden; text-overflow:ellipsis; white-space:nowrap; color:var(--admin-text); }
  .vs-track { height:8px; border-radius:6px; background:rgba(174,130,37,.12); overflow:hidden; }
  .vs-track span { display:block; height:100%; border-radius:6px; background:var(--admin-primary); }
  .vs-n { text-align:right; font-weight:700; color:var(--admin-text); }
</style>
@endpush
