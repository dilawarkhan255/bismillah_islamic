@extends('admin.layouts.app')

@section('title', 'Students')

@section('content')
<x-admin.page-header title="Students" icon="bi-mortarboard" eyebrow="Classes" subtitle="Your students and their class times.">
  <button type="button" class="btn btn-danger-soft js-bulk-delete" data-table="#studentsTable" data-form="bulkDeleteForm" disabled>
    <i class="bi bi-trash"></i> Delete selected <span class="js-bulk-count"></span>
  </button>
  <a href="{{ route('admin.students.import') }}" class="btn btn-light"><i class="bi bi-file-earmark-arrow-up"></i> Import Excel</a>
  <a href="{{ route('admin.classes.index') }}" class="btn btn-light"><i class="bi bi-calendar-week"></i> Timetable</a>
  <a href="{{ route('admin.students.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Student</a>
</x-admin.page-header>

<div class="d-flex flex-wrap gap-2 mb-3">
  @foreach(['active' => 'Active', 'paused' => 'Paused', 'left' => 'Left', 'all' => 'All'] as $key => $label)
    <a href="{{ route('admin.students.index', ['status' => $key]) }}"
       class="btn btn-sm {{ $status === $key ? 'btn-primary' : 'btn-light' }}">
      {{ $label }}
      <span class="ms-1 opacity-75">{{ $key === 'all' ? $counts->sum() : ($counts[$key] ?? 0) }}</span>
    </a>
  @endforeach
</div>

<div class="panel">
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="studentsTable">
        <thead>
          <tr>
            <th style="width:36px;"><input type="checkbox" class="form-check-input js-select-all" aria-label="Select all"></th>
            <th>Student</th>
            <th>Parent</th>
            <th>WhatsApp</th>
            <th>Country / Time</th>
            <th>Course</th>
            <th class="text-center">Classes</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
            <tr>
              <td><input type="checkbox" class="form-check-input js-row-check" value="{{ $student->id }}" aria-label="Select"></td>
              <td><a href="{{ route('admin.students.edit', $student) }}" class="fw-bold text-decoration-none" style="color:var(--admin-text);">{{ $student->name }}</a></td>
              <td>{{ $student->parent_name ?: '-' }}</td>
              <td>
                @if($student->whatsapp_url)
                  <a href="{{ $student->whatsapp_url }}" target="_blank" rel="noopener" class="text-decoration-none"><i class="bi bi-whatsapp" style="color:#25D366;"></i> {{ $student->whatsapp }}</a>
                @else - @endif
              </td>
              <td>{{ $student->country ?: '-' }}<br><small class="text-muted">{{ $student->timezone_label }}</small></td>
              <td>{{ $student->course ?: '-' }}</td>
              <td class="text-center">
                @if($student->active_classes_count)
                  {{ $student->active_classes_count }}
                @else
                  <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);" title="No class time added yet">None</span>
                @endif
              </td>
              <td>@include('admin.pages.students._status', ['status' => $student->status])</td>
              <td class="text-end">
                <div class="d-flex justify-content-end gap-2">
                  <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                  <x-admin.delete-button :action="route('admin.students.destroy', $student)" :name="$student->name" />
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<form id="bulkDeleteForm" action="{{ route('admin.students.bulk-destroy') }}" method="POST" style="display:none;">
  @csrf @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(function() {
  var dt = initDatatables('#studentsTable', { order: [], columnDefs: [{ targets: 0, orderable: false, searchable: false }] });
  initBulkDelete(dt, 'student');
});
</script>
@endpush
