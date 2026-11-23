{{-- Student page > Progress tab: parent link, level, class reports --}}
@php $shareText = "Assalamu Alaikum! Here is {$student->name}'s progress page at Bismillah Islamic Academy: {$student->progress_url}"; @endphp
<div class="row g-4">
  <div class="col-lg-5">
    <div class="panel mb-4">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-link-45deg"></i> Parent link</h5></div>
      <div class="panel-body">
        <p class="small text-muted">Parents open this page without a login. Only people with the link can see it.</p>
        <div class="input-group mb-2">
          <input type="text" class="form-control" id="parentLink" value="{{ $student->progress_url }}" readonly>
          <button class="btn btn-light" type="button" onclick="navigator.clipboard.writeText(document.getElementById('parentLink').value);this.innerHTML='<i class=\'bi bi-check2\'></i> Copied'"><i class="bi bi-clipboard"></i> Copy</button>
        </div>
        <div class="d-flex flex-wrap gap-2">
          <a class="btn btn-sm btn-light" href="{{ $student->progress_url }}"><i class="bi bi-eye"></i> Open page</a>
          @if($student->whatsappLink())
            <a class="btn btn-sm btn-success" href="{{ $student->whatsappLink($shareText) }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> Send on WhatsApp</a>
          @endif
          <form action="{{ route('admin.students.reset-link', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Make a new link? The old link will stop working.')">
            @csrf
            <button class="btn btn-sm btn-light" type="submit"><i class="bi bi-arrow-repeat"></i> New link</button>
          </form>
        </div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-bar-chart"></i> Where the student is now</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.students.level', $student) }}" method="POST">
          @csrf @method('PUT')
          <label class="form-label fw-bold">Current lesson / level</label>
          <input type="text" name="current_level" class="form-control mb-3" value="{{ $student->current_level }}" placeholder="e.g. Qaida – Takhti 7 · Para 3">
          <label class="form-label fw-bold">Course done: <span class="js-pct">{{ $student->progress_percent }}</span>%</label>
          <input type="range" name="progress_percent" min="0" max="100" step="5" class="form-range mb-3" value="{{ $student->progress_percent }}" oninput="this.closest('form').querySelector('.js-pct').textContent=this.value">
          <div class="text-end"><button class="btn btn-primary" type="submit"><i class="bi bi-check-lg"></i> Save</button></div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="panel mb-4">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-journal-plus"></i> Add a class report</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.students.progress.store', $student) }}" method="POST" class="row g-2">
          @csrf
          <div class="col-md-6"><label class="form-label small mb-1">Date</label><input type="date" name="date" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-md-6"><label class="form-label small mb-1">Attendance</label>
            <select name="attendance" class="form-select">
              @foreach(\App\Models\StudentProgress::ATTENDANCE as $value => [$label]) <option value="{{ $value }}">{{ $label }}</option> @endforeach
            </select>
          </div>
          <div class="col-12"><label class="form-label small mb-1">Lesson covered</label><input type="text" name="lesson" class="form-control" placeholder="e.g. Takhti 7, lines 1–5"></div>
          <div class="col-12"><label class="form-label small mb-1">Note for parents</label><input type="text" name="note" class="form-control" placeholder="e.g. Good effort, practise the 'ع' sound at home"></div>
          <div class="col-12 text-end"><button class="btn btn-primary" type="submit"><i class="bi bi-plus-lg"></i> Add report</button></div>
        </form>
      </div>
    </div>

    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent reports</h5></div>
      <div class="panel-body">
        @forelse($student->progress as $p)
          <div class="rec-row">
            <span class="rec-badge" style="background:{{ $p->attendance_color }}1f;color:{{ $p->attendance_color }};">{{ $p->attendance_label }}</span>
            <div class="flex-grow-1 min-w-0">
              <strong>{{ $p->date->format('D d M') }}</strong> @if($p->lesson)· {{ $p->lesson }}@endif
              @if($p->note)<br><small class="text-muted">{{ $p->note }}</small>@endif
            </div>
            <x-admin.delete-button :action="route('admin.progress.destroy', $p)" name="this report" />
          </div>
        @empty
          <p class="text-muted small mb-0">No reports yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
