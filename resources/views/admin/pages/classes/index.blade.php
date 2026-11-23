@extends('admin.layouts.app')

@section('title', 'Timetable')

@php
  $query = array_filter(['teacher' => $filters['teacher'], 'day' => $filters['day'] !== 'all' ? $filters['day'] : null, 'status' => $filters['status'] !== 'active' ? $filters['status'] : null]);
  $link = fn (array $change) => route('admin.classes.index', array_filter(array_merge($query, $change), fn ($v) => $v !== null && $v !== ''));
  $dayTitle = $filters['day'] === 'today' ? 'Today (' . \App\Models\ClassSchedule::DAY_NAMES[$filters['day_number']] . ')' : (\App\Models\ClassSchedule::DAY_NAMES[$filters['day_number']] ?? null);
@endphp

@section('content')
<x-admin.page-header title="Timetable" icon="bi-calendar-week" eyebrow="Classes" subtitle="All class times in Pakistan time, with each student's own time.">
  <a href="{{ route('admin.classes.print', $query) }}" class="btn btn-light"><i class="bi bi-printer"></i> Print</a>
  <a href="{{ route('admin.classes.export', $query) }}" class="btn btn-light"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
  <a href="{{ route('admin.students.import') }}" class="btn btn-light"><i class="bi bi-file-earmark-arrow-up"></i> Import</a>
  <a href="{{ route('admin.students.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Student</a>
</x-admin.page-header>

<div class="panel mb-3">
  <div class="panel-body">
    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
      <a href="{{ $link(['day' => null]) }}" class="btn btn-sm {{ $filters['day'] === 'all' ? 'btn-primary' : 'btn-light' }}">All days</a>
      <a href="{{ $link(['day' => 'today']) }}" class="btn btn-sm {{ $filters['day'] === 'today' ? 'btn-primary' : 'btn-light' }}">
        <i class="bi bi-sun"></i> Today <span class="opacity-75">{{ $todayCount }}</span>
      </a>
      <span class="text-muted mx-1">|</span>
      @foreach(\App\Models\ClassSchedule::DAYS as $num => $label)
        <a href="{{ $link(['day' => $num]) }}" class="btn btn-sm {{ (string) $filters['day'] === (string) $num ? 'btn-primary' : 'btn-light' }}">{{ $label }}</a>
      @endforeach
    </div>

    <form method="GET" class="row g-2 align-items-end">
      @if($filters['day'] !== 'all')<input type="hidden" name="day" value="{{ $filters['day'] }}">@endif
      <div class="col-sm-6 col-md-4">
        <label class="form-label small text-muted mb-1">Teacher</label>
        <select name="teacher" class="form-select" onchange="this.form.submit()">
          <option value="">All teachers</option>
          @foreach($teachers as $t)
            <option value="{{ $t->id }}" @selected($filters['teacher'] === $t->id)>{{ $t->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-6 col-md-3">
        <label class="form-label small text-muted mb-1">Show</label>
        <select name="status" class="form-select" onchange="this.form.submit()">
          <option value="active" @selected($filters['status'] === 'active')>Running classes</option>
          <option value="all" @selected($filters['status'] === 'all')>Include paused / left</option>
        </select>
      </div>
    </form>
  </div>
</div>

<div class="panel">
  <div class="panel-header">
    <h5 class="mb-0">{{ $dayTitle ?? 'All days' }} <span class="text-muted fw-normal">· {{ $classes->count() }} {{ Str::plural('class', $classes->count()) }}</span></h5>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="classesTable">
        <thead>
          <tr>
            <th>Time (PK)</th>
            <th>Days</th>
            <th>Student</th>
            <th>Student's time</th>
            <th>Teacher</th>
            <th>Course</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classes as $class)
            <tr class="{{ $class->status !== 'active' || $class->student->status !== 'active' ? 'opacity-50' : '' }}">
              <td data-order="{{ $class->start_minutes }}" style="white-space:nowrap;">
                <strong>{{ $class->time_label }}</strong><br>
                <small class="text-muted">to {{ $class->end_time_label }}</small>
              </td>
              <td>{{ $class->days_label }}</td>
              <td>
                <a href="{{ route('admin.students.edit', $class->student) }}" class="fw-bold text-decoration-none" style="color:var(--admin-text);">{{ $class->student->name }}</a>
                @if($class->student->whatsapp_url)
                  <a href="{{ $class->student->whatsapp_url }}" target="_blank" rel="noopener" title="WhatsApp {{ $class->student->whatsapp }}"><i class="bi bi-whatsapp" style="color:#25D366;"></i></a>
                @endif
                @if($class->student->parent_name)<br><small class="text-muted">{{ $class->student->parent_name }}</small>@endif
              </td>
              <td>
                @if($class->local_time_label)
                  {{ $class->local_time_label }}<br><small class="text-muted">{{ $class->local_days_label }} · {{ $class->student->timezone_label }}</small>
                @else
                  <span class="text-muted">Same (Pakistan)</span>
                @endif
              </td>
              <td>{{ $class->teacher?->name ?? '—' }}</td>
              <td>{{ $class->course ?: $class->student->course }}</td>
              <td class="text-end">
                <div class="d-flex justify-content-end gap-2">
                  <a href="{{ route('admin.classes.edit', $class) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                  <form action="{{ route('admin.classes.destroy', $class) }}" method="POST" class="d-inline js-confirm-delete" data-name="this class">
                    @csrf @method('DELETE')
                    <input type="hidden" name="return" value="timetable">
                    <button type="submit" class="btn btn-sm btn-action btn-action-delete" title="Delete"><i class="bi bi-trash"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @if($classes->isEmpty())
      <p class="text-center text-muted py-4 mb-0">No classes here yet. Open a student and add their class time.</p>
    @endif
  </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
  @if($classes->isNotEmpty())
  initDatatables('#classesTable', { order: [[0, 'asc']], pageLength: 50 });
  @endif
});
</script>
@endpush
