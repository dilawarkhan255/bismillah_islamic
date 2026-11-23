@extends('admin.layouts.app')

@section('title', 'Norani Qaida')

@section('content')
<x-admin.page-header title="Norani Qaida" icon="bi-book-half" eyebrow="Manage"
  subtitle="The Qaida PDF shown on the website at /norani-qaida.">
  <a href="{{ route('qaida') }}" target="_blank" class="btn btn-light"><i class="bi bi-box-arrow-up-right"></i> View on website</a>
</x-admin.page-header>

<div class="panel">
  <div class="panel-header">
    <h5 class="mb-0"><i class="bi bi-file-earmark-pdf"></i> Norani Qaida PDF</h5>
    @if($pdfInfo)
      <a href="{{ asset('storage/' . $pdfInfo['path']) }}" target="_blank" class="btn btn-sm btn-light"><i class="bi bi-eye"></i> Open PDF</a>
    @endif
  </div>

  <div class="panel-body" style="max-width:640px;">
    @if($pdfInfo)
      <div class="qa-pdf-file">
        <i class="bi bi-file-earmark-pdf-fill"></i>
        <div class="flex-grow-1 min-w-0">
          <strong class="d-block text-truncate">{{ $pdfInfo['name'] }}</strong>
          <small class="text-muted">{{ number_format($pdfInfo['size'] / 1048576, 1) }} MB</small>
        </div>
        <x-admin.delete-button :action="route('admin.qaida.pdf.delete')" name="the Qaida PDF" />
      </div>
    @elseif($pdfMissing)
      <div class="alert alert-warning mb-3"><i class="bi bi-exclamation-triangle"></i> The PDF file is missing from storage. Please upload it again.</div>
    @else
      <p class="text-muted mb-3">No PDF uploaded. Upload one to show the Qaida on the website.</p>
    @endif

    <form action="{{ route('admin.qaida.pdf.upload') }}" method="POST" enctype="multipart/form-data" class="mt-3">
      @csrf
      <label class="form-label">{{ $pdfInfo ? 'Replace PDF' : 'Upload PDF' }} <span class="text-muted fw-normal">(max 40 MB)</span></label>
      <div class="d-flex gap-2">
        <input type="file" name="pdf" class="form-control" accept="application/pdf,.pdf" required>
        <button type="submit" class="btn btn-primary text-nowrap"><i class="bi bi-upload"></i> Upload</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
  .qa-pdf-file { display:flex; align-items:center; gap:.85rem; padding:.85rem 1rem; border:1px solid var(--admin-border); border-radius:12px; background:var(--admin-surface-soft); }
  .qa-pdf-file > i { font-size:2rem; color:#dc2626; }
</style>
@endpush
