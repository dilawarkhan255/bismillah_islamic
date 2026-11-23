{{-- Class form fields. Needs: $class (ClassSchedule), $teachers, $days, optional $defaultCourse --}}
@php
  $selectedDays = array_map('intval', old('days', $class->days ?? []));
@endphp
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label fw-bold">Teacher</label>
    <select name="teacher_id" class="form-select">
      <option value="">— Not assigned yet —</option>
      @foreach($teachers as $t)
        <option value="{{ $t->id }}" @selected((string) old('teacher_id', $class->teacher_id) === (string) $t->id)>{{ $t->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label fw-bold">Course</label>
    <input type="text" name="course" class="form-control" value="{{ old('course', $class->course ?? ($defaultCourse ?? '')) }}" placeholder="e.g. Norani Qaida">
  </div>

  <div class="col-12">
    <label class="form-label fw-bold">Days <span class="text-danger">*</span></label>
    <div class="d-flex flex-wrap gap-2">
      @foreach($days as $num => $label)
        <input type="checkbox" class="btn-check" name="days[]" value="{{ $num }}" id="day{{ $num }}{{ $class->id ?? 'new' }}" autocomplete="off" @checked(in_array($num, $selectedDays, true))>
        <label class="btn btn-sm btn-outline-secondary cls-day" for="day{{ $num }}{{ $class->id ?? 'new' }}">{{ $label }}</label>
      @endforeach
      <button type="button" class="btn btn-sm btn-link js-weekdays">Mon – Fri</button>
    </div>
  </div>

  <div class="col-md-4">
    <label class="form-label fw-bold">Time (Pakistan) <span class="text-danger">*</span></label>
    <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $class->start_time) }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label fw-bold">Length</label>
    <select name="duration_minutes" class="form-select">
      @foreach([20, 30, 40, 45, 60, 90] as $m)
        <option value="{{ $m }}" @selected((int) old('duration_minutes', $class->duration_minutes ?: 30) === $m)>{{ $m }} minutes</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label class="form-label fw-bold">Status</label>
    <select name="status" class="form-select">
      @foreach(\App\Models\ClassSchedule::STATUSES as $value => $label)
        <option value="{{ $value }}" @selected(old('status', $class->status ?: 'active') === $value)>{{ $label }}</option>
      @endforeach
    </select>
  </div>

  <div class="col-12">
    <label class="form-label fw-bold">Notes</label>
    <input type="text" name="notes" class="form-control" value="{{ old('notes', $class->notes) }}" placeholder="e.g. Microsoft Teams link, lesson to start from">
  </div>
</div>

@once
@push('styles')
<style>
  .btn-check:checked + .cls-day { background: var(--admin-primary); border-color: var(--admin-primary); color: #fff; }
  .cls-day { min-width: 52px; }
</style>
@endpush
@push('scripts')
<script>
  document.addEventListener('click', function (e) {
    if (!e.target.classList.contains('js-weekdays')) return;
    e.target.closest('.d-flex').querySelectorAll('input[name="days[]"]').forEach(function (box) {
      box.checked = Number(box.value) <= 5;
    });
  });
</script>
@endpush
@endonce
