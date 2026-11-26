@extends('admin.layouts.app')

@section('title', 'Chatbot FAQs')

@section('content')
<x-admin.page-header title="Chatbot FAQs" icon="bi-chat-dots" eyebrow="Site setup" subtitle="Questions the website chatbot answers. The first six show as quick buttons."></x-admin.page-header>

@if(\App\Support\ChatAssistant::enabled())
  <div class="alert d-flex gap-2 align-items-start mb-4" style="background:rgba(15,118,110,.1);border:1px solid rgba(15,118,110,.3);color:var(--admin-text);">
    <i class="bi bi-stars" style="color:var(--admin-success);"></i>
    <div><strong>AI answers are ON</strong> ({{ config('services.anthropic.model') }}). Typed questions are answered by the AI using these FAQs, your courses and contact details. Quick buttons still use the answers below.</div>
  </div>
@else
  <div class="alert d-flex gap-2 align-items-start mb-4" style="background:rgba(174,130,37,.08);border:1px solid rgba(174,130,37,.3);color:var(--admin-text);">
    <i class="bi bi-info-circle" style="color:var(--admin-primary);"></i>
    <div><strong>AI answers are OFF</strong> — the chatbot answers from these FAQs only. To turn AI on, add <code>ANTHROPIC_API_KEY=...</code> to the server's <code>.env</code>.</div>
  </div>
@endif

<div class="row g-4">
  <div class="col-lg-7">
    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-list-check"></i> Questions ({{ $faqs->count() }})</h5></div>
      <div class="panel-body">
        @forelse($faqs as $faq)
          <div class="faq-row {{ $faq->is_active ? '' : 'opacity-50' }}">
            <span class="faq-no">{{ $loop->iteration }}</span>
            <div class="flex-grow-1 min-w-0">
              <strong>{{ $faq->question }}</strong>
              @if($loop->iteration <= 6 && $faq->is_active)<span class="badge ms-1" style="background:rgba(174,130,37,.15);color:var(--admin-primary);">quick button</span>@endif
              @unless($faq->is_active)<span class="badge ms-1 bg-secondary">hidden</span>@endunless
              <p class="small text-muted mb-1">{{ Str::limit($faq->answer, 140) }}</p>
              @if($faq->keywords)<small class="text-muted"><i class="bi bi-search"></i> {{ $faq->keywords }}</small>@endif
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
              <x-admin.delete-button :action="route('admin.faqs.destroy', $faq)" name="this question" />
            </div>
          </div>
        @empty
          <p class="text-muted mb-0">No questions yet. Add the first one.</p>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add a question</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.faqs.store') }}" method="POST">
          @csrf
          @include('admin.pages.faqs._form', ['faq' => new \App\Models\Faq()])
          <div class="text-end mt-4"><button class="btn btn-primary" type="submit"><i class="bi bi-plus-lg"></i> Add</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .faq-row { display:flex; gap:.85rem; align-items:flex-start; padding:.85rem 0; border-top:1px solid var(--admin-border); }
  .faq-row:first-child { border-top:0; padding-top:0; }
  .faq-no { min-width:28px; height:28px; display:grid; place-items:center; border-radius:8px; background:rgba(174,130,37,.12); color:var(--admin-primary); font-weight:800; font-size:.8rem; }
</style>
@endpush
