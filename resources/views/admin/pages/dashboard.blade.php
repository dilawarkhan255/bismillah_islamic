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

{{-- Main Metric Cards --}}
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <a href="{{ route('admin.enrollments.index') }}" class="text-decoration-none">
      <article class="metric-card metric-warning">
        <div class="metric-top">
          <span class="metric-label">Pending Enrollments</span>
          <span class="metric-icon"><i class="bi bi-person-plus"></i></span>
        </div>
        <div class="metric-value">{{ $stats['enrollments_pending'] }}</div>
        <div class="metric-meta"><span>Awaiting review</span></div>
      </article>
    </a>
  </div>
  <div class="col-sm-6 col-xl-3">
    <a href="{{ route('admin.messages.index') }}" class="text-decoration-none">
      <article class="metric-card metric-danger">
        <div class="metric-top">
          <span class="metric-label">Unread Messages</span>
          <span class="metric-icon"><i class="bi bi-envelope"></i></span>
        </div>
        <div class="metric-value">{{ $stats['messages_unread'] }}</div>
        <div class="metric-meta"><span>Require attention</span></div>
      </article>
    </a>
  </div>
  <div class="col-sm-6 col-xl-3">
    <a href="{{ route('admin.free-trials.index') }}" class="text-decoration-none">
      <article class="metric-card metric-primary">
        <div class="metric-top">
          <span class="metric-label">Pending Free Trials</span>
          <span class="metric-icon"><i class="bi bi-calendar-check"></i></span>
        </div>
        <div class="metric-value">{{ $stats['free_trials_pending'] }}</div>
        <div class="metric-meta"><span>Awaiting confirmation</span></div>
      </article>
    </a>
  </div>
  <div class="col-sm-6 col-xl-3">
    <a href="{{ route('admin.page-content.index') }}" class="text-decoration-none">
      <article class="metric-card metric-success">
        <div class="metric-top">
          <span class="metric-label">Pages Managed</span>
          <span class="metric-icon"><i class="bi bi-file-earmark-text"></i></span>
        </div>
        <div class="metric-value">{{ $stats['pages_managed'] }}</div>
        <div class="metric-meta"><span>{{ $stats['sections_managed'] }} content sections</span></div>
      </article>
    </a>
  </div>
</div>

{{-- Secondary Metric Cards --}}
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-person-badge me-1"></i>Teachers</span>
        <a href="{{ route('admin.teachers.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['teachers'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-people me-1"></i>Team Members</span>
        <a href="{{ route('admin.team-members.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['team_members'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-book me-1"></i>Courses</span>
        <a href="{{ route('admin.courses.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['courses'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-journal-text me-1"></i>Blog Posts</span>
        <a href="{{ route('admin.blog.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['blog_posts'] }}</strong>
    </article>
  </div>
</div>

{{-- Tertiary Stats --}}
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-person-check me-1"></i>Total Enrollments</span>
        <a href="{{ route('admin.enrollments.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['enrollments_total'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-envelope-open me-1"></i>Total Messages</span>
        <a href="{{ route('admin.messages.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['messages_total'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-calendar-event me-1"></i>Total Free Trials</span>
        <a href="{{ route('admin.free-trials.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['free_trials_total'] }}</strong>
    </article>
  </div>
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-images me-1"></i>Gallery Items</span>
        <a href="{{ route('admin.gallery.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['gallery_items'] }}</strong>
    </article>
  </div>
</div>

{{-- Quick Actions --}}
<div class="row g-3">
  <div class="col-sm-6 col-xl-3">
    <article class="mini-card">
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted"><i class="bi bi-chat-quote me-1"></i>Testimonials</span>
        <a href="{{ route('admin.testimonials.index') }}" style="font-size:12px;color:var(--admin-primary);text-decoration:none;">View</a>
      </div>
      <strong>{{ $stats['testimonials'] }}</strong>
    </article>
  </div>
</div>
@endsection
