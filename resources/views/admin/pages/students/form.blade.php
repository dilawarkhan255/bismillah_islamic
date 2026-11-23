@extends('admin.layouts.app')

@section('title', $student->exists ? $student->name : 'Add Student')

@section('content')
<x-admin.page-header :title="$student->exists ? $student->name : 'Add Student'" icon="bi-mortarboard" eyebrow="Students" :back="route('admin.students.index')">
  @if($student->exists)
    @if($student->whatsapp_url)
      <a href="{{ $student->whatsapp_url }}" target="_blank" rel="noopener" class="btn btn-light"><i class="bi bi-whatsapp" style="color:#25D366;"></i> WhatsApp</a>
    @endif
    <x-admin.delete-button :action="route('admin.students.destroy', $student)" :name="$student->name" label="Delete" />
  @endif
</x-admin.page-header>

<div class="row g-4">
  {{-- ═══ Student details ═══ --}}
  <div class="{{ $student->exists ? 'col-xl-5' : 'col-xl-8' }}">
    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-person"></i> Student details</h5></div>
      <div class="panel-body">
        <form action="{{ $student->exists ? route('admin.students.update', $student) : route('admin.students.store') }}" method="POST">
          @csrf
          @if($student->exists) @method('PUT') @endif

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">Student name <span class="text-danger">*</span></label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Parent name</label>
              <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name', $student->parent_name) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">WhatsApp</label>
              <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $student->whatsapp) }}" placeholder="+44 7400 000000">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Country</label>
              <input type="text" name="country" class="form-control" value="{{ old('country', $student->country) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Student's timezone <span class="text-danger">*</span></label>
              <select name="timezone" class="form-select" required>
                @foreach(\App\Support\Timezones::OPTIONS as $group => $zones)
                  <optgroup label="{{ $group }}">
                    @foreach($zones as $zone => $label)
                      <option value="{{ $zone }}" @selected(old('timezone', $student->timezone) === $zone)>{{ $label }}</option>
                    @endforeach
                  </optgroup>
                @endforeach
              </select>
              <small class="text-muted">Used to show the class in the student's own time.</small>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Course</label>
              <input type="text" name="course" class="form-control" list="courseList" value="{{ old('course', $student->course) }}">
              <datalist id="courseList">
                @foreach($courses as $c)<option value="{{ $c }}">@endforeach
              </datalist>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">Status</label>
              <select name="status" class="form-select">
                @foreach(\App\Models\Student::STATUSES as $value => $label)
                  <option value="{{ $value }}" @selected(old('status', $student->status) === $value)>{{ $label }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">Started</label>
              <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $student->start_date?->format('Y-m-d')) }}">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Monthly fee</label>
              <input type="number" step="0.01" min="0" name="fee_amount" class="form-control" value="{{ old('fee_amount', $student->fee_amount !== null ? rtrim(rtrim((string) $student->fee_amount, '0'), '.') : '') }}" placeholder="e.g. 40">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Currency</label>
              <select name="fee_currency" class="form-select">
                @foreach(\App\Models\Student::CURRENCIES as $code => $symbol)
                  <option value="{{ $code }}" @selected(old('fee_currency', $student->fee_currency) === $code)>{{ $code }} ({{ $symbol }})</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Due on day</label>
              <input type="number" min="1" max="28" name="fee_due_day" class="form-control" value="{{ old('fee_due_day', $student->fee_due_day ?: 5) }}">
            </div>
            <div class="col-12">
              <label class="form-label fw-bold">Notes</label>
              <textarea name="notes" class="form-control" rows="3">{{ old('notes', $student->notes) }}</textarea>
            </div>
          </div>

          <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> {{ $student->exists ? 'Save student' : 'Add student' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @if($student->exists)
  {{-- ═══ Classes ═══ --}}
  <div class="col-xl-7">
    <div class="panel mb-4">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-calendar-week"></i> Classes</h5></div>
      <div class="panel-body">
        @forelse($student->classes as $class)
          <div class="cls-row">
            <div class="cls-time">
              <strong>{{ $class->time_label }}</strong>
              <small>{{ $class->duration_minutes }} min · PK</small>
            </div>
            <div class="flex-grow-1 min-w-0">
              <div class="fw-bold">{{ $class->days_label }} <span class="text-muted fw-normal">· {{ $class->teacher?->name ?? 'No teacher' }}</span></div>
              <small class="text-muted">
                {{ $class->course ?: $student->course }}
                @if($class->local_time_label)
                  · <i class="bi bi-globe2"></i> Student's time: {{ $class->local_days_label }} {{ $class->local_time_label }}
                @endif
                @if($class->status !== 'active') · <span style="color:#AE8225;">Paused</span> @endif
              </small>
              @if($class->notes)<br><small class="text-muted"><i class="bi bi-sticky"></i> {{ $class->notes }}</small>@endif
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.classes.edit', $class) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
              <x-admin.delete-button :action="route('admin.classes.destroy', $class)" :name="'this class'" />
            </div>
          </div>
        @empty
          <p class="text-muted mb-0">No class times yet. Add the first one below.</p>
        @endforelse
      </div>
    </div>

    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add a class</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.classes.store') }}" method="POST">
          @csrf
          <input type="hidden" name="student_id" value="{{ $student->id }}">
          @include('admin.pages.classes._fields', ['class' => new \App\Models\ClassSchedule(['status' => 'active', 'duration_minutes' => 30]), 'defaultCourse' => $student->course])
          <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add class</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif
</div>

@if($student->exists)
  @include('admin.pages.students._records')
@endif
@endsection

@push('styles')
<style>
  .cls-row { display:flex; align-items:center; gap:1rem; padding:.85rem 0; border-bottom:1px solid var(--admin-border); }
  .cls-row:last-child { border-bottom:0; padding-bottom:0; }
  .cls-row:first-child { padding-top:0; }
  .cls-time { min-width:92px; text-align:center; padding:.45rem .6rem; border-radius:10px; background:rgba(174,130,37,.1); }
  .cls-time strong { display:block; color:var(--admin-primary); }
  .cls-time small { color:var(--admin-muted); font-size:.72rem; }
</style>
@endpush
