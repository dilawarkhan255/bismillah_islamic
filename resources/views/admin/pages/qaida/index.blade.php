@extends('admin.layouts.app')

@section('title', 'Norani Qaida')

@section('content')
<x-admin.page-header title="Norani Qaida" icon="bi-book-half" eyebrow="Manage"
  subtitle="Takhtiyan (lessons) shown on the website at /norani-qaida.">
  <a href="{{ route('qaida') }}" target="_blank" class="btn btn-light"><i class="bi bi-box-arrow-up-right"></i> View on website</a>
  <button class="btn btn-primary" onclick="openModal('addLessonModal')"><i class="bi bi-plus-lg"></i> Add Takhti</button>
</x-admin.page-header>

<div class="qa-tip mb-4">
  <i class="bi bi-mic"></i>
  <div>
    <strong>Adding audio:</strong> ask a teacher to record each line on a phone (voice memo is fine),
    then open a takhti and upload the file next to that line. mp3, m4a, wav, ogg and aac work, up to 10 MB.
  </div>
</div>

{{-- ═══ Qaida PDF ═══ --}}
<div class="panel mb-4">
  <div class="panel-header">
    <h5 class="mb-0"><i class="bi bi-file-earmark-pdf"></i> Norani Qaida PDF</h5>
    @if($pdfInfo)
      <a href="{{ asset('storage/' . $pdfInfo['path']) }}" target="_blank" class="btn btn-sm btn-light"><i class="bi bi-eye"></i> Open PDF</a>
    @endif
  </div>

  <div class="row g-4">
    <div class="col-lg-6">
      @if($pdfInfo)
        <div class="qa-pdf-file">
          <i class="bi bi-file-earmark-pdf-fill"></i>
          <div class="flex-grow-1 min-w-0">
            <strong class="d-block text-truncate">{{ $pdfInfo['name'] }}</strong>
            <small class="text-muted">{{ number_format($pdfInfo['size'] / 1048576, 1) }} MB</small>
          </div>
          <x-admin.delete-button :action="route('admin.qaida.pdf.delete')" name="the Qaida PDF" />
        </div>
      @else
        <p class="text-muted mb-3">No PDF uploaded. Upload one to show the whole Qaida as a book on the website.</p>
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

    <div class="col-lg-6">
      <form action="{{ route('admin.qaida.display') }}" method="POST">
        @csrf @method('PUT')
        <label class="form-label">What the Norani Qaida page shows</label>
        @foreach([
          'pdf' => ['PDF only', 'Visitors read the uploaded PDF page by page.'],
          'both' => ['PDF + takhtiyan', 'PDF on top, the interactive takhtiyan (with audio) below.'],
          'lessons' => ['Takhtiyan only', 'The interactive takhtiyan made on this site.'],
        ] as $value => [$label, $desc])
          <label class="qa-choice {{ $display === $value ? 'is-on' : '' }} {{ !$pdfInfo && $value !== 'lessons' ? 'is-disabled' : '' }}">
            <input type="radio" name="display" value="{{ $value }}" class="form-check-input" @checked($display === $value) @disabled(!$pdfInfo && $value !== 'lessons') onchange="this.form.submit()">
            <span><strong>{{ $label }}</strong><small>{{ $desc }}</small></span>
          </label>
        @endforeach
      </form>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-header"><h5 class="mb-0"><i class="bi bi-list-ol"></i> Takhtiyan</h5></div>
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th style="width:80px">Takhti</th>
          <th>Title</th>
          <th class="text-center">Lines</th>
          <th style="width:220px">Audio recorded</th>
          <th>Status</th>
          <th class="text-end" style="width:140px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($lessons as $lesson)
          @php $pct = $lesson->items_count ? round($lesson->audio_count / $lesson->items_count * 100) : 0; @endphp
          <tr>
            <td><span class="qa-no">{{ $lesson->number }}</span></td>
            <td>
              <a href="{{ route('admin.qaida.edit', $lesson) }}" class="fw-bold text-decoration-none" style="color:var(--admin-text);">{{ $lesson->title }}</a>
              @if($lesson->subtitle)<br><small class="text-muted">{{ $lesson->subtitle }}</small>@endif
            </td>
            <td class="text-center">{{ $lesson->items_count }}</td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <div class="progress flex-grow-1" style="height:6px;">
                  <div class="progress-bar" style="width:{{ $pct }}%; background:var(--admin-success);"></div>
                </div>
                <small class="text-muted" style="white-space:nowrap;">{{ $lesson->audio_count }}/{{ $lesson->items_count }}</small>
              </div>
            </td>
            <td>
              @if($lesson->is_active)
                <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Visible</span>
              @else
                <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Hidden</span>
              @endif
            </td>
            <td class="text-end">
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.qaida.edit', $lesson) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                <x-admin.delete-button :action="route('admin.qaida.destroy', $lesson)" :name="'Takhti ' . $lesson->number" />
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted py-4">No takhtiyan yet. Click "Add Takhti" to start.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<x-admin.modal id="addLessonModal" title="Add Takhti" size="md">
  <form action="{{ route('admin.qaida.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-4 mb-3">
        <label class="form-label">Number</label>
        <input type="number" name="number" class="form-control" min="1" value="{{ old('number', ($lessons->max('number') ?? 0) + 1) }}" required>
      </div>
      <div class="col-8 mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" placeholder="e.g. Mashq" value="{{ old('title') }}" required>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Subtitle</label>
      <input type="text" name="subtitle" class="form-control" placeholder="e.g. Practice words" value="{{ old('subtitle') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">How to read (shown to students)</label>
      <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="form-check form-switch mb-3">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" id="newActive" checked>
      <label class="form-check-label" for="newActive">Visible on website</label>
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Create Takhti</button>
    </div>
  </form>
</x-admin.modal>
@endsection

@push('styles')
<style>
  .qa-tip { display:flex; gap:.75rem; padding:.9rem 1.1rem; border:1px solid var(--admin-border); border-radius:12px; background:rgba(174,130,37,.06); font-size:.9rem; }
  .qa-tip > i { color:var(--admin-primary); font-size:1.2rem; }
  .qa-pdf-file { display:flex; align-items:center; gap:.85rem; padding:.85rem 1rem; border:1px solid var(--admin-border); border-radius:12px; background:var(--admin-surface-soft); }
  .qa-pdf-file > i { font-size:2rem; color:#dc2626; }
  .qa-choice { display:flex; gap:.75rem; align-items:flex-start; padding:.7rem .9rem; margin-bottom:.5rem; border:1px solid var(--admin-border); border-radius:10px; cursor:pointer; }
  .qa-choice.is-on { border-color:var(--admin-primary); background:rgba(174,130,37,.07); }
  .qa-choice.is-disabled { opacity:.5; cursor:not-allowed; }
  .qa-choice .form-check-input { margin-top:.25rem; }
  .qa-choice strong { display:block; font-size:.9rem; }
  .qa-choice small { color:var(--admin-muted); }
  .qa-no { display:inline-grid; place-items:center; width:38px; height:38px; border-radius:10px; background:rgba(174,130,37,.12); color:var(--admin-primary); font-weight:800; }
</style>
@endpush
