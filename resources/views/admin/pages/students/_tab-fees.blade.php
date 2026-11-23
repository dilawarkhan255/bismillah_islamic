{{-- Student page > Fees tab. Needs: $thisMonth, $paidThisMonth --}}
<div class="row g-4">
  <div class="col-lg-5">
    <div class="panel">
      <div class="panel-header">
        <h5 class="mb-0"><i class="bi bi-cash-coin"></i> {{ $thisMonth->format('F Y') }}</h5>
        <a href="{{ route('admin.fees.index') }}" class="btn btn-sm btn-light">All fees</a>
      </div>
      <div class="panel-body">
        @if(! $student->fee_amount)
          <p class="text-muted small">No monthly fee set. Add it in the <a href="#details" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('tab-details')).show()">Details</a> tab.</p>
        @else
          <div class="rec-fee mb-4 {{ $paidThisMonth ? 'is-paid' : '' }}">
            <div>
              <strong>{{ $student->money($student->fee_amount) }}</strong><br>
              <small>{{ $paidThisMonth ? 'Paid on ' . $paidThisMonth->paid_on->format('d M') : 'Not paid yet · due ' . $thisMonth->setDay($student->fee_due_day)->format('j M') }}</small>
            </div>
            @if(! $paidThisMonth && $student->whatsappLink())
              <a class="btn btn-sm btn-success" target="_blank" rel="noopener" href="{{ $student->whatsappLink($student->feeReminderMessage($thisMonth)) }}"><i class="bi bi-whatsapp"></i> Send reminder</a>
            @endif
          </div>
        @endif

        <h6 class="fw-bold mb-2">Record a payment</h6>
        <form action="{{ route('admin.students.payments.store', $student) }}" method="POST" class="row g-2">
          @csrf
          <div class="col-6"><label class="form-label small mb-1">For month</label><input type="month" name="month" class="form-control" value="{{ $thisMonth->format('Y-m') }}" required></div>
          <div class="col-6"><label class="form-label small mb-1">Paid on</label><input type="date" name="paid_on" class="form-control" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}" required></div>
          <div class="col-6"><label class="form-label small mb-1">Amount</label><input type="number" step="0.01" min="0" name="amount" class="form-control" value="{{ $student->fee_amount ? rtrim(rtrim((string) $student->fee_amount, '0'), '.') : '' }}" required></div>
          <div class="col-6"><label class="form-label small mb-1">Currency</label>
            <select name="currency" class="form-select">
              @foreach(\App\Models\Student::CURRENCIES as $code => $symbol)<option value="{{ $code }}" @selected($student->fee_currency === $code)>{{ $code }}</option>@endforeach
            </select>
          </div>
          <div class="col-12"><label class="form-label small mb-1">Method</label>
            <select name="method" class="form-select">
              @foreach(\App\Models\FeePayment::METHODS as $m)<option>{{ $m }}</option>@endforeach
            </select>
          </div>
          <div class="col-12"><button class="btn btn-primary w-100" type="submit"><i class="bi bi-check2-circle"></i> Mark as paid</button></div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="panel">
      <div class="panel-header"><h5 class="mb-0"><i class="bi bi-receipt"></i> Payment history</h5></div>
      <div class="panel-body">
        @forelse($student->payments as $pay)
          <div class="rec-row">
            <span class="rec-badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Paid</span>
            <div class="flex-grow-1"><strong>{{ $pay->month->format('F Y') }}</strong> · {{ $student->money($pay->amount, $pay->currency) }}<br><small class="text-muted">{{ $pay->paid_on->format('d M Y') }}{{ $pay->method ? ' · ' . $pay->method : '' }}</small></div>
            <x-admin.delete-button :action="route('admin.payments.destroy', $pay)" name="this payment" />
          </div>
        @empty
          <p class="text-muted small mb-0">No payments recorded yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
