{{-- Student page > Certificates tab --}}
@php $mainTeacher = $student->classes->first()?->teacher?->name; @endphp
<div class="row g-4">
  <div class="col-lg-5">
    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-plus-circle"></i> New certificate</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.students.certificates.store', $student) }}" method="POST" class="row g-2">
          @csrf
          <div class="col-12"><label class="form-label small mb-1">Title</label><input type="text" name="title" class="form-control" value="Completion of {{ $student->course ?: 'Norani Qaida' }}" required></div>
          <div class="col-6"><label class="form-label small mb-1">Course</label><input type="text" name="course" class="form-control" value="{{ $student->course }}"></div>
          <div class="col-6"><label class="form-label small mb-1">Teacher</label><input type="text" name="teacher_name" class="form-control" value="{{ $mainTeacher }}"></div>
          <div class="col-12"><label class="form-label small mb-1">Date</label><input type="date" name="issued_on" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-12"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-award"></i> Create certificate</button></div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="panel">
      <div class="panel-header">
        <h5 class="mb-0"><i class="bi bi-award"></i> Certificates</h5>
        <a href="{{ route('certificates.index') }}" class="btn btn-sm btn-light">All certificates</a>
      </div>
      <div class="panel-body">
        @forelse($student->certificates as $cert)
          <div class="rec-row">
            <span class="rec-badge" style="background:rgba(174,130,37,.12);color:#AE8225;"><i class="bi bi-award"></i></span>
            <div class="flex-grow-1 min-w-0"><strong>{{ $cert->title }}</strong><br><small class="text-muted">{{ $cert->serial }} · {{ $cert->issued_on->format('d M Y') }}</small></div>
            <a href="{{ route('certificate.show', $cert) }}" class="btn btn-sm btn-light"><i class="bi bi-printer"></i> Open / Print</a>
            <x-admin.delete-button :action="route('admin.certificates.destroy', $cert)" name="this certificate" />
          </div>
        @empty
          <p class="text-muted small mb-0">No certificates yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
