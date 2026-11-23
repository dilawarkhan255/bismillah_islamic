@extends('layouts.app')

@section('title', 'Certificates — Admin · Bismillah Islamic Academy')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="ai-wrap">
  <div class="container">
    <div class="ai-head">
      <div>
        <span class="ai-eyebrow"><i class="fas fa-lock"></i> Admin only — students and visitors can't see this list</span>
        <h1 class="ai-title">Certificates</h1>
        <p class="ai-sub">Every certificate issued. Each one also has its own page that anyone with the certificate number can check.</p>
      </div>
      <div class="ai-actions">
        <a href="{{ route('progress.index') }}" class="ai-btn ai-btn--light">Progress Pages</a>
        <a href="{{ route('admin.students.index') }}" class="ai-btn">Issue in Admin</a>
      </div>
    </div>

    <input type="search" class="ai-search" placeholder="Search name, course or number…" oninput="var q=this.value.toLowerCase();document.querySelectorAll('.ai-card').forEach(function(c){c.hidden=c.dataset.name.indexOf(q)===-1;})">

    <div class="row g-3">
      @forelse($certificates as $c)
        <div class="col-lg-4 col-md-6 ai-card" data-name="{{ Str::lower($c->student->name . ' ' . $c->title . ' ' . $c->serial) }}">
          <div class="ai-item">
            <div class="d-flex gap-3 align-items-start">
              <i class="fas fa-award ai-award"></i>
              <div class="min-w-0">
                <strong class="ai-name">{{ $c->student->name }}</strong>
                <small class="d-block">{{ $c->title }}</small>
                <small class="d-block text-muted">{{ $c->serial }} · {{ $c->issued_on->format('d M Y') }}{{ $c->teacher_name ? ' · ' . $c->teacher_name : '' }}</small>
              </div>
            </div>
            <div class="ai-links">
              <a href="{{ route('certificate.show', $c) }}"><i class="fas fa-print"></i> Open / Print</a>
              @if($c->student->whatsappLink())
                <a href="{{ $c->student->whatsappLink('Assalamu Alaikum! Congratulations — here is ' . $c->student->name . "'s certificate: " . route('certificate.show', $c)) }}" target="_blank" rel="noopener" class="wa"><i class="fab fa-whatsapp"></i> Send</a>
              @endif
              <a href="{{ route('admin.students.edit', $c->student) }}#certificates"><i class="fas fa-pen"></i> Student</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12"><p class="text-muted">No certificates yet. Open a student in Admin and click "Create" under Certificates.</p></div>
      @endforelse
    </div>
  </div>
</section>
@include('pages._admin-index-styles')
@endsection
