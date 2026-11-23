{{-- Progress / fees / certificates on Admin > Students > edit. Needs: $student (with progress, payments, certificates, classes) --}}
@php
  $thisMonth = \Carbon\CarbonImmutable::now(\App\Support\Timezones::ACADEMY)->startOfMonth();
  $paidThisMonth = $student->paidFor($thisMonth);
  $shareText = "Assalamu Alaikum! Here is {$student->name}'s progress page at Bismillah Islamic Academy: {$student->progress_url}";
  $mainTeacher = $student->classes->first()?->teacher?->name;
@endphp

<div class="row g-4 mt-1">
  {{-- ═══ Progress ═══ --}}
  <div class="col-xl-7" id="progress">
    <div class="panel h-100">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-graph-up-arrow"></i> Progress & parent link</h5></div>
      <div class="panel-body">

        <label class="form-label fw-bold">Parent link <small class="text-muted fw-normal">— parents open it without a login</small></label>
        <div class="input-group mb-2">
          <input type="text" class="form-control" id="parentLink" value="{{ $student->progress_url }}" readonly>
          <button class="btn btn-light" type="button" onclick="navigator.clipboard.writeText(document.getElementById('parentLink').value);this.innerHTML='<i class=\'bi bi-check2\'></i> Copied'"><i class="bi bi-clipboard"></i> Copy</button>
          <a class="btn btn-light" href="{{ $student->progress_url }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
        </div>
        <div class="d-flex flex-wrap gap-2 mb-4">
          @if($student->whatsappLink())
            <a class="btn btn-sm btn-success" href="{{ $student->whatsappLink($shareText) }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> Send link on WhatsApp</a>
          @endif
          <form action="{{ route('admin.students.reset-link', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Make a new link? The old link will stop working.')">
            @csrf
            <button class="btn btn-sm btn-light" type="submit"><i class="bi bi-arrow-repeat"></i> New link</button>
          </form>
        </div>

        <form action="{{ route('admin.students.level', $student) }}" method="POST" class="row g-2 align-items-end mb-4">
          @csrf @method('PUT')
          <div class="col-md-6">
            <label class="form-label fw-bold">Current lesson / level</label>
            <input type="text" name="current_level" class="form-control" value="{{ $student->current_level }}" placeholder="e.g. Qaida – Takhti 7 · Para 3 · Surah Yaseen">
          </div>
          <div class="col-md-4">
            <label class="form-label fw-bold">Course done <span class="js-pct">{{ $student->progress_percent }}</span>%</label>
            <input type="range" name="progress_percent" min="0" max="100" step="5" class="form-range" value="{{ $student->progress_percent }}" oninput="this.closest('form').querySelector('.js-pct').textContent=this.value">
          </div>
          <div class="col-md-2"><button class="btn btn-primary w-100" type="submit">Save</button></div>
        </form>

        <h6 class="fw-bold">Add a class report</h6>
        <form action="{{ route('admin.students.progress.store', $student) }}" method="POST" class="row g-2 mb-3">
          @csrf
          <div class="col-md-4"><input type="date" name="date" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-md-3">
            <select name="attendance" class="form-select">
              @foreach(\App\Models\StudentProgress::ATTENDANCE as $value => [$label]) <option value="{{ $value }}">{{ $label }}</option> @endforeach
            </select>
          </div>
          <div class="col-md-5"><input type="text" name="lesson" class="form-control" placeholder="Lesson, e.g. Takhti 7 lines 1–5"></div>
          <div class="col-md-10"><input type="text" name="note" class="form-control" placeholder="Note for parents, e.g. Good effort, practise 'ع' sound at home"></div>
          <div class="col-md-2"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-plus-lg"></i> Add</button></div>
        </form>

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

  <div class="col-xl-5">
    {{-- ═══ Fees ═══ --}}
    <div class="panel mb-4" id="fees">
      <div class="panel-header">
        <h5 class="mb-0"><i class="bi bi-cash-coin"></i> Fees</h5>
        <a href="{{ route('admin.fees.index') }}" class="btn btn-sm btn-light">All fees</a>
      </div>
      <div class="panel-body">
        @if(! $student->fee_amount)
          <p class="text-muted small">Set the monthly fee in Student details to track payments.</p>
        @else
          <div class="rec-fee mb-3 {{ $paidThisMonth ? 'is-paid' : '' }}">
            <div>
              <strong>{{ $thisMonth->format('F Y') }}: {{ $student->money($student->fee_amount) }}</strong><br>
              <small>{{ $paidThisMonth ? 'Paid on ' . $paidThisMonth->paid_on->format('d M') : 'Not paid yet · due ' . $thisMonth->setDay($student->fee_due_day)->format('j M') }}</small>
            </div>
            @if(! $paidThisMonth && $student->whatsappLink())
              <a class="btn btn-sm btn-success" target="_blank" rel="noopener" href="{{ $student->whatsappLink($student->feeReminderMessage($thisMonth)) }}"><i class="bi bi-whatsapp"></i> Reminder</a>
            @endif
          </div>
        @endif

        <form action="{{ route('admin.students.payments.store', $student) }}" method="POST" class="row g-2 mb-3">
          @csrf
          <div class="col-6"><label class="form-label small mb-0">Month</label><input type="month" name="month" class="form-control" value="{{ $thisMonth->format('Y-m') }}" required></div>
          <div class="col-6"><label class="form-label small mb-0">Paid on</label><input type="date" name="paid_on" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-5"><input type="number" step="0.01" min="0" name="amount" class="form-control" value="{{ $student->fee_amount ? rtrim(rtrim((string) $student->fee_amount, '0'), '.') : '' }}" placeholder="Amount" required></div>
          <div class="col-3">
            <select name="currency" class="form-select">
              @foreach(\App\Models\Student::CURRENCIES as $code => $symbol)<option value="{{ $code }}" @selected($student->fee_currency === $code)>{{ $code }}</option>@endforeach
            </select>
          </div>
          <div class="col-4">
            <select name="method" class="form-select">
              @foreach(\App\Models\FeePayment::METHODS as $m)<option>{{ $m }}</option>@endforeach
            </select>
          </div>
          <div class="col-12"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-check2-circle"></i> Mark as paid</button></div>
        </form>

        @forelse($student->payments as $pay)
          <div class="rec-row">
            <span class="rec-badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Paid</span>
            <div class="flex-grow-1"><strong>{{ $pay->month->format('M Y') }}</strong> · {{ $student->money($pay->amount, $pay->currency) }}<br><small class="text-muted">{{ $pay->paid_on->format('d M Y') }}{{ $pay->method ? ' · ' . $pay->method : '' }}</small></div>
            <x-admin.delete-button :action="route('admin.payments.destroy', $pay)" name="this payment" />
          </div>
        @empty
          <p class="text-muted small mb-0">No payments recorded yet.</p>
        @endforelse
      </div>
    </div>

    {{-- ═══ Certificates ═══ --}}
    <div class="panel" id="certificates">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-award"></i> Certificates</h5></div>
      <div class="panel-body">
        <form action="{{ route('admin.students.certificates.store', $student) }}" method="POST" class="row g-2 mb-3">
          @csrf
          <div class="col-12"><input type="text" name="title" class="form-control" value="Completion of {{ $student->course ?: 'Norani Qaida' }}" required></div>
          <div class="col-6"><input type="text" name="course" class="form-control" value="{{ $student->course }}" placeholder="Course"></div>
          <div class="col-6"><input type="text" name="teacher_name" class="form-control" value="{{ $mainTeacher }}" placeholder="Teacher"></div>
          <div class="col-6"><input type="date" name="issued_on" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-6"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-award"></i> Create</button></div>
        </form>

        @forelse($student->certificates as $cert)
          <div class="rec-row">
            <span class="rec-badge" style="background:rgba(174,130,37,.12);color:#AE8225;"><i class="bi bi-award"></i></span>
            <div class="flex-grow-1 min-w-0"><strong>{{ $cert->title }}</strong><br><small class="text-muted">{{ $cert->serial }} · {{ $cert->issued_on->format('d M Y') }}</small></div>
            <a href="{{ route('certificate.show', $cert) }}" target="_blank" class="btn btn-sm btn-light"><i class="bi bi-printer"></i> Print</a>
            <x-admin.delete-button :action="route('admin.certificates.destroy', $cert)" name="this certificate" />
          </div>
        @empty
          <p class="text-muted small mb-0">No certificates yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>

@push('styles')
<style>
  .rec-row { display:flex; align-items:center; gap:.75rem; padding:.6rem 0; border-top:1px solid var(--admin-border); }
  .rec-badge { font-size:.72rem; font-weight:700; padding:.3rem .55rem; border-radius:8px; white-space:nowrap; min-width:64px; text-align:center; }
  .rec-fee { display:flex; align-items:center; justify-content:space-between; gap:.75rem; padding:.8rem 1rem; border-radius:12px; border:1px solid rgba(220,38,38,.35); background:rgba(220,38,38,.06); }
  .rec-fee.is-paid { border-color:rgba(15,118,110,.35); background:rgba(15,118,110,.07); }
</style>
@endpush
