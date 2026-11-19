@extends('admin.layouts.app')

@section('title', 'Takhti ' . $lesson->number)

@section('content')
<x-admin.page-header :title="'Takhti ' . $lesson->number . ': ' . $lesson->title" icon="bi-book-half" eyebrow="Norani Qaida"
  :back="route('admin.qaida.index')">
  @if($lesson->is_active)
    <a href="{{ route('qaida.show', $lesson->slug) }}" target="_blank" class="btn btn-light"><i class="bi bi-box-arrow-up-right"></i> View</a>
  @endif
  <x-admin.delete-button :action="route('admin.qaida.destroy', $lesson)" :name="'Takhti ' . $lesson->number" label="Delete" />
</x-admin.page-header>

<div class="row g-4">
  {{-- Lesson details --}}
  <div class="col-xl-4">
    <form action="{{ route('admin.qaida.update', $lesson) }}" method="POST" enctype="multipart/form-data" class="panel">
      @csrf @method('PUT')
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-info-circle"></i> Takhti details</h5></div>

      <div class="row">
        <div class="col-4 mb-3">
          <label class="form-label">Number</label>
          <input type="number" name="number" class="form-control" min="1" value="{{ old('number', $lesson->number) }}" required>
        </div>
        <div class="col-8 mb-3">
          <label class="form-label">Order</label>
          <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $lesson->sort_order) }}">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $lesson->title) }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Urdu title (on the takhti header)</label>
        <input type="text" name="title_ur" class="form-control qa-urdu-input" dir="rtl" placeholder="مثلاً: مفردات" value="{{ old('title_ur', $lesson->title_ur) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Subtitle</label>
        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $lesson->subtitle) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">ہدایات (Urdu, shown on the takhti)</label>
        <textarea name="description_ur" class="form-control qa-urdu-input" dir="rtl" rows="4">{{ old('description_ur', $lesson->description_ur) }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">How to read (English, under the takhti)</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $lesson->description) }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Letter groups under the takhti (optional)</label>
        <textarea name="groups_text" class="form-control qa-groups-input" dir="rtl" rows="5"
          placeholder="حروفِ حلقی | Throat letters | ء ه ع ح غ خ">{{ old('groups_text', \App\Http\Controllers\Admin\QaidaLessonController::groupsToText($lesson->groups)) }}</textarea>
        <div class="form-text">One group per line: <code>Urdu title | English title | letters</code>. Several sets of letters: separate with <code>/</code>.</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Recording of the whole takhti (optional)</label>
        @if($lesson->audio)
          <audio controls preload="none" src="{{ asset('storage/' . $lesson->audio) }}" class="w-100 mb-2"></audio>
          <div class="form-check mb-2">
            <input type="checkbox" name="remove_audio" value="1" class="form-check-input" id="rmLessonAudio">
            <label class="form-check-label" for="rmLessonAudio">Remove this recording</label>
          </div>
        @endif
        <input type="file" name="audio" class="form-control" accept="audio/*">
      </div>
      <div class="form-check form-switch mb-3">
        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="lessonActive" @checked(old('is_active', $lesson->is_active))>
        <label class="form-check-label" for="lessonActive">Visible on website</label>
      </div>
      <button type="submit" class="btn btn-primary w-100"><i class="bi bi-check-lg"></i> Save Takhti</button>
    </form>

    {{-- Bulk add --}}
    <form action="{{ route('admin.qaida.items.store', $lesson) }}" method="POST" class="panel mt-4">
      @csrf
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add lines</h5></div>
      <p class="text-muted small mb-2">One line per row. Optionally add the pronunciation after a <code>|</code>:</p>
      <pre class="qa-example" dir="rtl">بَ  بِ  بُ | ba bi bu
تَ  تِ  تُ | ta ti tu</pre>
      <textarea name="lines" class="form-control qa-arabic-input" rows="6" dir="rtl" placeholder="بَ  بِ  بُ | ba bi bu" required>{{ old('lines') }}</textarea>
      <button type="submit" class="btn btn-light w-100 mt-3"><i class="bi bi-plus-lg"></i> Add to takhti</button>
    </form>
  </div>

  {{-- Lines --}}
  <div class="col-xl-8">
    <div class="panel">
      <div class="panel-header">
        <h5 class="mb-0"><i class="bi bi-list-ol"></i> Lines ({{ $lesson->items->count() }})</h5>
        <small class="text-muted"><i class="bi bi-mic-fill" style="color:var(--admin-success);"></i> {{ $lesson->items->whereNotNull('audio')->count() }} with audio</small>
      </div>

      @forelse($lesson->items as $item)
        <div class="qa-item" id="item-{{ $item->id }}">
          <form action="{{ route('admin.qaida.items.update', $item) }}" method="POST" enctype="multipart/form-data" class="qa-item-form">
            @csrf @method('PUT')
            <input type="number" name="sort_order" value="{{ $item->sort_order }}" class="form-control qa-order" min="0" title="Order" aria-label="Order">
            <div class="qa-fields">
              <input type="text" name="text" value="{{ $item->text }}" class="form-control qa-arabic-input" dir="rtl" required aria-label="Arabic text">
              <div class="d-flex gap-2">
                <input type="text" name="transliteration" value="{{ $item->transliteration }}" class="form-control form-control-sm" placeholder="Pronunciation (optional)" aria-label="Pronunciation">
                <input type="text" name="hint" value="{{ $item->hint }}" class="form-control form-control-sm qa-hint-input" dir="rtl" placeholder="نام (با)" title="Small name shown above the letter, e.g. با" aria-label="Small name above letter">
              </div>
              <div class="qa-audio">
                @if($item->audio)
                  <audio controls preload="none" src="{{ asset('storage/' . $item->audio) }}"></audio>
                  <label class="form-check-label small"><input type="checkbox" name="remove_audio" value="1" class="form-check-input me-1">Remove</label>
                @else
                  <span class="qa-no-audio"><i class="bi bi-mic-mute"></i> No audio</span>
                @endif
                <input type="file" name="audio" class="form-control form-control-sm" accept="audio/*" aria-label="Upload audio">
              </div>
            </div>
            <button type="submit" class="btn btn-sm btn-action" title="Save line"><i class="bi bi-check-lg"></i></button>
          </form>
          <x-admin.delete-button :action="route('admin.qaida.items.destroy', $item)" :name="'this line'" />
        </div>
      @empty
        <p class="text-muted text-center py-4 mb-0">No lines yet. Add them with the "Add lines" box.</p>
      @endforelse
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .qa-arabic-input { font-family: 'Amiri', 'Traditional Arabic', serif; font-size: 1.45rem; line-height: 1.6; }
  .qa-example { margin: 0 0 .6rem; padding: .5rem .75rem; border-radius: 8px; background: var(--admin-surface-soft); font-family: 'Amiri', serif; font-size: 1.1rem; white-space: pre-wrap; }
  .qa-item { display: flex; align-items: flex-start; gap: .5rem; padding: .85rem 0; border-bottom: 1px solid var(--admin-border); }
  .qa-item:last-child { border-bottom: 0; }
  .qa-item:target { background: rgba(174,130,37,.08); border-radius: 10px; }
  .qa-item-form { flex: 1; display: flex; align-items: flex-start; gap: .6rem; min-width: 0; }
  .qa-order { width: 64px; flex: 0 0 auto; }
  .qa-fields { flex: 1; min-width: 0; display: grid; gap: .4rem; }
  .qa-audio { display: flex; flex-wrap: wrap; align-items: center; gap: .5rem; }
  .qa-audio audio { height: 34px; max-width: 260px; }
  .qa-audio input[type=file] { max-width: 260px; }
  .qa-no-audio { font-size: .8rem; color: var(--admin-muted); }
  .qa-urdu-input { font-family: 'Noto Nastaliq Urdu', serif; font-size: 1rem; line-height: 2.2; }
  .qa-groups-input { font-family: 'Amiri', serif; font-size: 1.05rem; line-height: 1.9; }
  .qa-hint-input { max-width: 110px; font-family: 'Noto Nastaliq Urdu', serif; }
</style>
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
@endpush
