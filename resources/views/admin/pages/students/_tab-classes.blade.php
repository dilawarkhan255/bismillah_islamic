{{-- Student page > Classes tab --}}
<div class="row g-4">
  <div class="col-lg-7">
    <div class="panel h-100">
      <div class="panel-header">
        <h5 class="mb-0"><i class="bi bi-calendar-week"></i> Class times</h5>
        <a href="{{ route('admin.classes.index') }}" class="btn btn-sm btn-light">Full timetable</a>
      </div>
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
                @if($class->local_clock_label)
                  · <i class="bi bi-globe2"></i> Student's time: {{ $class->local_days_label }} {{ $class->local_clock_label }}
                @endif
                @if($class->status !== 'active') · <span style="color:#AE8225;">Paused</span> @endif
              </small>
              @if($class->notes)<br><small class="text-muted"><i class="bi bi-sticky"></i> {{ $class->notes }}</small>@endif
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.classes.edit', $class) }}" class="btn btn-sm btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
              <x-admin.delete-button :action="route('admin.classes.destroy', $class)" name="this class" />
            </div>
          </div>
        @empty
          <p class="text-muted mb-0">No class times yet. Add the first one with the form.</p>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-lg-5">
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
</div>
