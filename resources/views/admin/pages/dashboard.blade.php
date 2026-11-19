@extends('admin.layouts.app')

@section('title', 'Dashboard')

@php
  $hour = (int) now()->format('G');
  $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
  $statusBadge = fn ($s) => match ($s) {
      'approved' => ['Approved', 'dash-badge--ok'],
      'rejected' => ['Rejected', 'dash-badge--no'],
      default    => ['Pending', 'dash-badge--wait'],
  };
@endphp

@section('content')

{{-- Welcome --}}
<div class="dash-hero">
  <div>
    <p class="dash-hero-date">{{ now()->format('l, j F Y') }}</p>
    <h1 class="dash-hero-title">{{ $greeting }}, {{ auth()->user()->name }}</h1>
    <p class="dash-hero-text">Here's what is happening at Bismillah Islamic Academy today.</p>
  </div>
  <div class="dash-hero-actions">
    @can('manage courses')
      <a href="{{ route('admin.courses.index') }}" class="btn btn-light"><i class="bi bi-plus-lg"></i> Course</a>
    @endcan
    @can('manage blog')
      <a href="{{ route('admin.blog.create') }}" class="btn btn-light"><i class="bi bi-plus-lg"></i> Blog Post</a>
    @endcan
    <a href="{{ url('/') }}" target="_blank" class="btn btn-primary"><i class="bi bi-box-arrow-up-right"></i> Visit Website</a>
  </div>
</div>

{{-- Key numbers --}}
<div class="row g-3 mb-4">
  @php
    $kpis = [
      ['manage enrollments', 'admin.enrollments.index', 'bi-person-plus', 'Pending Enrollments', $stats['enrollments_pending'], $stats['enrollments_total'] . ' total', 'warning'],
      ['manage free trials', 'admin.free-trials.index', 'bi-calendar-check', 'Pending Free Trials', $stats['free_trials_pending'], $stats['free_trials_total'] . ' total', 'primary'],
      ['manage messages', 'admin.messages.index', 'bi-envelope', 'Unread Messages', $stats['messages_unread'], $stats['messages_total'] . ' total', 'danger'],
      ['manage courses', 'admin.courses.index', 'bi-book', 'Courses', $stats['courses'], $stats['teachers'] . ' teachers', 'success'],
    ];
  @endphp
  @foreach($kpis as [$perm, $route, $icon, $label, $value, $meta, $tone])
    <div class="col-sm-6 col-xl-3">
      @can($perm)<a href="{{ route($route) }}" class="dash-kpi-link">@endcan
        <article class="dash-kpi dash-kpi--{{ $tone }}">
          <span class="dash-kpi-icon"><i class="bi {{ $icon }}"></i></span>
          <div>
            <div class="dash-kpi-value">{{ $value }}</div>
            <div class="dash-kpi-label">{{ $label }}</div>
            <div class="dash-kpi-meta">{{ $meta }}</div>
          </div>
        </article>
      @can($perm)</a>@endcan
    </div>
  @endforeach
</div>

<div class="row g-3 mb-4">
  {{-- Latest enrollments --}}
  @can('manage enrollments')
  <div class="col-xl-6">
    <section class="panel h-100">
      <div class="panel-header">
        <h2 class="h5 mb-0"><i class="bi bi-person-plus"></i> Latest Enrollments</h2>
        <a href="{{ route('admin.enrollments.index') }}" class="dash-see-all">View all <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse($recentEnrollments as $e)
        @php [$sLabel, $sClass] = $statusBadge($e->status); @endphp
        <a href="{{ route('admin.enrollments.show', $e) }}" class="dash-row">
          <span class="dash-avatar">{{ strtoupper(mb_substr($e->student_name, 0, 1)) }}</span>
          <span class="dash-row-main">
            <strong>{{ $e->student_name }}</strong>
            <small>{{ $e->course ?: '—' }}</small>
          </span>
          <span class="dash-badge {{ $sClass }}">{{ $sLabel }}</span>
          <small class="dash-row-time">{{ $e->created_at->diffForHumans(short: true) }}</small>
        </a>
      @empty
        <p class="dash-empty"><i class="bi bi-inbox"></i> No enrollments yet.</p>
      @endforelse
    </section>
  </div>
  @endcan

  {{-- Latest free trials --}}
  @can('manage free trials')
  <div class="col-xl-6">
    <section class="panel h-100">
      <div class="panel-header">
        <h2 class="h5 mb-0"><i class="bi bi-calendar-check"></i> Latest Free Trial Requests</h2>
        <a href="{{ route('admin.free-trials.index') }}" class="dash-see-all">View all <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse($recentTrials as $t)
        @php [$sLabel, $sClass] = $statusBadge($t->status); @endphp
        <a href="{{ route('admin.free-trials.show', $t) }}" class="dash-row">
          <span class="dash-avatar dash-avatar--alt">{{ strtoupper(mb_substr($t->student_name, 0, 1)) }}</span>
          <span class="dash-row-main">
            <strong>{{ $t->student_name }}</strong>
            <small>{{ $t->course ?: '—' }}@if($t->country) · {{ $t->country }}@endif</small>
          </span>
          <span class="dash-badge {{ $sClass }}">{{ $sLabel }}</span>
          <small class="dash-row-time">{{ $t->created_at->diffForHumans(short: true) }}</small>
        </a>
      @empty
        <p class="dash-empty"><i class="bi bi-inbox"></i> No free trial requests yet.</p>
      @endforelse
    </section>
  </div>
  @endcan
</div>

{{-- Website content overview --}}
<section class="panel">
  <div class="panel-header">
    <h2 class="h5 mb-0"><i class="bi bi-grid"></i> Website Content</h2>
  </div>
  <div class="dash-tiles">
    @php
      $tiles = [
        ['manage teachers', 'admin.teachers.index', 'bi-person-badge', 'Teachers', $stats['teachers']],
        ['manage courses', 'admin.courses.index', 'bi-book', 'Courses', $stats['courses']],
        ['manage blog', 'admin.blog.index', 'bi-journal-text', 'Blog Posts', $stats['blog_posts']],
        ['manage testimonials', 'admin.testimonials.index', 'bi-chat-quote', 'Testimonials', $stats['testimonials']],
        ['manage gallery', 'admin.gallery.index', 'bi-images', 'Gallery Photos', $stats['gallery_items']],
        ['manage team members', 'admin.team-members.index', 'bi-people', 'Team Members', $stats['team_members']],
        ['manage page content', 'admin.page-content.index', 'bi-file-earmark-text', 'Pages', $stats['pages_managed']],
      ];
    @endphp
    @foreach($tiles as [$perm, $route, $icon, $label, $value])
      @can($perm)
        <a href="{{ route($route) }}" class="dash-tile">
          <span class="dash-tile-icon"><i class="bi {{ $icon }}"></i></span>
          <span class="dash-tile-value">{{ $value }}</span>
          <span class="dash-tile-label">{{ $label }}</span>
        </a>
      @endcan
    @endforeach
  </div>
</section>

@endsection
