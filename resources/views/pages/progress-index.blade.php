@extends('layouts.app')

@section('title', 'Student Progress Pages — Admin · Bismillah Islamic Academy')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="ai-wrap">
  <div class="container">
    <div class="ai-head">
      <div>
        <span class="ai-eyebrow"><i class="fas fa-lock"></i> Admin only — students and visitors can't see this list</span>
        <h1 class="ai-title">Student Progress Pages</h1>
        <p class="ai-sub">Each student's private page, exactly as their parents see it. Send a parent their link from here.</p>
      </div>
      <div class="ai-actions">
        <a href="{{ route('certificates.index') }}" class="ai-btn ai-btn--light">Certificates</a>
        <a href="{{ route('admin.students.index') }}" class="ai-btn">Manage in Admin</a>
      </div>
    </div>

    <input type="search" class="ai-search" placeholder="Search a student…" oninput="var q=this.value.toLowerCase();document.querySelectorAll('.ai-card').forEach(function(c){c.hidden=c.dataset.name.indexOf(q)===-1;})">

    <div class="row g-3">
      @forelse($students as $s)
        <div class="col-lg-4 col-md-6 ai-card" data-name="{{ Str::lower($s->name . ' ' . $s->parent_name) }}">
          <div class="ai-item {{ $s->status !== 'active' ? 'is-muted' : '' }}">
            <div class="d-flex justify-content-between align-items-start gap-2">
              <div class="min-w-0">
                <strong class="ai-name">{{ $s->name }}</strong>
                <small class="d-block text-muted">{{ $s->parent_name ?: '—' }} · {{ $s->course ?: 'No course' }}</small>
              </div>
              @if($s->status !== 'active')<span class="ai-tag">{{ ucfirst($s->status) }}</span>@endif
            </div>
            <div class="ai-bar"><span style="width:{{ $s->progress_percent }}%"></span></div>
            <small class="text-muted">{{ $s->current_level ?: 'No level set' }} · {{ $s->progress_percent }}% · {{ $s->progress_count }} {{ Str::plural('report', $s->progress_count) }}</small>
            <div class="ai-links">
              <a href="{{ $s->progress_url }}" target="_blank"><i class="fas fa-eye"></i> Open page</a>
              @if($s->whatsappLink())
                <a href="{{ $s->whatsappLink('Assalamu Alaikum! Here is ' . $s->name . "'s progress page at Bismillah Islamic Academy: " . $s->progress_url) }}" target="_blank" rel="noopener" class="wa"><i class="fab fa-whatsapp"></i> Send to parent</a>
              @endif
              <a href="{{ route('admin.students.edit', $s) }}#progress"><i class="fas fa-pen"></i> Edit</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12"><p class="text-muted">No students yet. Add them in Admin → Students.</p></div>
      @endforelse
    </div>
  </div>
</section>
@include('pages._admin-index-styles')
@endsection
