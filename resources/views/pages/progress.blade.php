@extends('layouts.app')

@section('title', $student->name . ' — Progress · Bismillah Islamic Academy')
@section('meta_description', 'Student progress report')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="pg-wrap">
  <div class="container">

    <div class="pg-head">
      <div>
        <span class="pg-eyebrow">Progress report</span>
        <h1 class="pg-name">{{ $student->name }}</h1>
        <p class="pg-sub">
          {{ $student->course ?: 'Quran classes' }}
          @if($student->start_date) · student since {{ $student->start_date->format('F Y') }} @endif
        </p>
      </div>
      @if($student->status === 'paused')
        <span class="pg-chip pg-chip--paused">Classes paused</span>
      @endif
    </div>

    <div class="row g-4">
      <div class="col-lg-4">
        <div class="pg-card">
          <h2 class="pg-h2">Where {{ Str::before($student->name, ' ') }} is now</h2>
          <p class="pg-level">{{ $student->current_level ?: 'Just started' }}</p>
          <div class="pg-bar" role="progressbar" aria-valuenow="{{ $student->progress_percent }}" aria-valuemin="0" aria-valuemax="100">
            <span style="width:{{ $student->progress_percent }}%"></span>
          </div>
          <p class="pg-muted mb-0">{{ $student->progress_percent }}% of the course completed</p>
        </div>

        <div class="pg-card">
          <h2 class="pg-h2">Attendance</h2>
          @if($attendance !== null)
            <p class="pg-big">{{ $attendance }}%</p>
            <p class="pg-muted mb-0">of classes attended in the last 60 days</p>
          @else
            <p class="pg-muted mb-0">No classes recorded yet.</p>
          @endif
        </div>

        <div class="pg-card">
          <h2 class="pg-h2">Class times <small>(your time)</small></h2>
          @forelse($student->classes as $class)
            <div class="pg-class">
              <i class="far fa-clock"></i>
              <div>
                <strong>{{ $class->local_days_label ?? $class->days_label }} · {{ $class->local_clock_label ?? $class->time_label }}</strong>
                <span>{{ $class->duration_minutes }} min · {{ $class->teacher?->name ?? 'Teacher to be confirmed' }}</span>
              </div>
            </div>
          @empty
            <p class="pg-muted mb-0">Class times will appear here once confirmed.</p>
          @endforelse
          <p class="pg-muted small mt-2 mb-0">Times are shown for {{ $student->timezone_label }}.</p>
        </div>

        @if($student->certificates->isNotEmpty())
          <div class="pg-card">
            <h2 class="pg-h2">Certificates</h2>
            @foreach($student->certificates as $cert)
              <a class="pg-cert" href="{{ route('certificate.show', $cert) }}" target="_blank">
                <i class="fas fa-award"></i> <span>{{ $cert->title }}<small>{{ $cert->issued_on->format('d M Y') }}</small></span>
              </a>
            @endforeach
          </div>
        @endif
      </div>

      <div class="col-lg-8">
        <div class="pg-card h-100">
          <h2 class="pg-h2">Recent classes</h2>
          @forelse($student->progress as $p)
            <div class="pg-report">
              <div class="pg-date">
                <strong>{{ $p->date->format('d') }}</strong>
                <span>{{ $p->date->format('M') }}</span>
              </div>
              <div class="flex-grow-1">
                <span class="pg-att" style="color:{{ $p->attendance_color }};border-color:{{ $p->attendance_color }}55;">{{ $p->attendance_label }}</span>
                @if($p->lesson)<strong class="pg-lesson">{{ $p->lesson }}</strong>@endif
                @if($p->note)<p class="pg-note">“{{ $p->note }}”</p>@endif
              </div>
            </div>
          @empty
            <p class="pg-muted">The teacher's reports will appear here after each class, In sha Allah.</p>
          @endforelse
        </div>
      </div>
    </div>

    <div class="pg-help">
      Questions about {{ Str::before($student->name, ' ') }}'s classes?
      <a href="https://wa.me/{{ preg_replace('/\D+/', '', (string) setting('whatsapp_float', '923141833216')) }}?text={{ rawurlencode('Assalamu Alaikum, I have a question about ' . $student->name . '\'s classes.') }}" target="_blank" rel="noopener">
        <i class="fab fa-whatsapp"></i> Message us on WhatsApp
      </a>
    </div>
  </div>
</section>

<style>
  .pg-wrap { padding: 48px 0 64px; background: var(--light-bg, #faf7f0); }
  .pg-head { display:flex; justify-content:space-between; align-items:flex-end; gap:16px; flex-wrap:wrap; margin-bottom:28px; }
  .pg-eyebrow { color: var(--gold); font: 700 11px/1 'Lato', sans-serif; letter-spacing: 2px; text-transform: uppercase; }
  .pg-name { font-family: 'Cinzel', serif; color: var(--navy); font-size: clamp(26px, 4vw, 38px); margin: 8px 0 4px; }
  .pg-sub { color: var(--text-mid, #555); margin: 0; }
  .pg-chip { padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 700; }
  .pg-chip--paused { background: rgba(174,130,37,.12); color: var(--gold); }
  .pg-card { background: #fff; border: 1px solid rgba(174,130,37,.18); padding: 22px; margin-bottom: 20px; box-shadow: 0 4px 18px rgba(13,27,42,.05); }
  .pg-h2 { font-family: 'Cinzel', serif; color: var(--navy); font-size: 16px; margin: 0 0 14px; }
  .pg-h2 small { font-family: 'Lato', sans-serif; color: #888; font-size: 12px; }
  .pg-level { font-size: 20px; font-weight: 700; color: var(--navy); margin-bottom: 12px; }
  .pg-bar { height: 10px; background: rgba(174,130,37,.15); border-radius: 10px; overflow: hidden; margin-bottom: 8px; }
  .pg-bar span { display: block; height: 100%; background: linear-gradient(90deg, var(--gold), #d4a843); border-radius: 10px; }
  .pg-big { font-size: 40px; font-weight: 800; color: var(--gold); line-height: 1; margin-bottom: 6px; }
  .pg-muted { color: #888; font-size: 14px; }
  .pg-class { display:flex; gap:12px; padding: 10px 0; border-top: 1px solid rgba(174,130,37,.12); }
  .pg-class:first-of-type { border-top: 0; padding-top: 0; }
  .pg-class i { color: var(--gold); margin-top: 3px; }
  .pg-class strong { display:block; color: var(--navy); font-size: 15px; }
  .pg-class span { color: #888; font-size: 13px; }
  .pg-cert { display:flex; gap:12px; align-items:center; padding: 10px 12px; border: 1px solid rgba(174,130,37,.25); margin-bottom: 8px; text-decoration: none; color: var(--navy); }
  .pg-cert i { color: var(--gold); font-size: 22px; }
  .pg-cert small { display:block; color:#888; }
  .pg-report { display:flex; gap:16px; padding: 14px 0; border-top: 1px solid rgba(174,130,37,.12); }
  .pg-report:first-of-type { border-top: 0; padding-top: 0; }
  .pg-date { min-width: 54px; text-align:center; padding: 6px; background: rgba(174,130,37,.08); align-self:flex-start; }
  .pg-date strong { display:block; font-size: 20px; color: var(--navy); line-height: 1.1; }
  .pg-date span { font-size: 11px; text-transform: uppercase; color: var(--gold); letter-spacing: 1px; }
  .pg-att { display:inline-block; font-size: 11px; font-weight: 700; padding: 2px 8px; border: 1px solid; border-radius: 12px; margin-right: 8px; }
  .pg-lesson { color: var(--navy); }
  .pg-note { color: #555; font-style: italic; margin: 6px 0 0; }
  .pg-help { margin-top: 24px; text-align: center; color: #666; }
  .pg-help a { color: #128C7E; font-weight: 700; text-decoration: none; margin-left: 6px; }
  [data-theme="dark"] .pg-wrap { background: transparent; }
  [data-theme="dark"] .pg-card { background: rgba(255,255,255,.04); }
  [data-theme="dark"] .pg-name, [data-theme="dark"] .pg-h2, [data-theme="dark"] .pg-level,
  [data-theme="dark"] .pg-class strong, [data-theme="dark"] .pg-date strong, [data-theme="dark"] .pg-lesson, [data-theme="dark"] .pg-cert { color: #f0efe8; }
</style>
@endsection
