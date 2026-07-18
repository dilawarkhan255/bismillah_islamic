@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
  <div class="page-heading-copy">
    <span class="page-icon"><i class="bi bi-speedometer2"></i></span>
    <div>
      <p class="eyebrow mb-1">Overview</p>
      <h1 class="h3 mb-1">Dashboard</h1>
      <p class="text-muted mb-0">Welcome to Bismillah Islamic Academy admin panel.</p>
    </div>
  </div>
</div>

<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <article class="metric-card metric-primary">
      <div class="metric-top">
        <span class="metric-label">Teachers</span>
        <span class="metric-icon"><i class="bi bi-person-badge"></i></span>
      </div>
      <div class="metric-value">{{ $stats['teachers'] }}</div>
      <div class="metric-meta"><span>Total registered teachers</span></div>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="metric-card metric-success">
      <div class="metric-top">
        <span class="metric-label">Courses</span>
        <span class="metric-icon"><i class="bi bi-book"></i></span>
      </div>
      <div class="metric-value">{{ $stats['courses'] }}</div>
      <div class="metric-meta"><span>Active courses</span></div>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="metric-card metric-warning">
      <div class="metric-top">
        <span class="metric-label">Pending Enrollments</span>
        <span class="metric-icon"><i class="bi bi-person-plus"></i></span>
      </div>
      <div class="metric-value">{{ $stats['enrollments_pending'] }}</div>
      <div class="metric-meta"><span>Awaiting review</span></div>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="metric-card metric-danger">
      <div class="metric-top">
        <span class="metric-label">Unread Messages</span>
        <span class="metric-icon"><i class="bi bi-envelope"></i></span>
      </div>
      <div class="metric-value">{{ $stats['messages_unread'] }}</div>
      <div class="metric-meta"><span>Require attention</span></div>
    </article>
  </div>
</div>

<div class="row g-3">
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <span class="text-muted">Blog Posts</span>
      <strong>{{ $stats['blog_posts'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <span class="text-muted">Testimonials</span>
      <strong>{{ $stats['testimonials'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <span class="text-muted">Pending Free Trials</span>
      <strong>{{ $stats['free_trials_pending'] }}</strong>
    </article>
  </div>
</div>
@endsection
