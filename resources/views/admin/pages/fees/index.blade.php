@extends('admin.layouts.app')

@section('title', 'Fees')

@section('content')
<x-admin.page-header title="Fees — {{ $month->format('F Y') }}" icon="bi-cash-coin" eyebrow="Classes" subtitle="Monthly fees of active students. Unpaid first; send a WhatsApp reminder in one click."></x-admin.page-header>

<div class="d-flex flex-wrap align-items-center gap-2 mb-3">
  <a class="btn btn-sm btn-light" href="{{ route('admin.fees.index', ['month' => $month->subMonth()->format('Y-m')]) }}"><i class="bi bi-chevron-left"></i> {{ $month->subMonth()->format('M') }}</a>
  <form method="GET" class="d-inline"><input type="month" name="month" class="form-control form-control-sm" value="{{ $month->format('Y-m') }}" onchange="this.form.submit()"></form>
  <a class="btn btn-sm btn-light" href="{{ route('admin.fees.index', ['month' => $month->addMonth()->format('Y-m')]) }}">{{ $month->addMonth()->format('M') }} <i class="bi bi-chevron-right"></i></a>
</div>

<div class="row g-3 mb-4">
  @php $unpaid = $rows->whereNull('payment')->count(); $overdue = $rows->where('overdue', true)->count(); @endphp
  <div class="col-6 col-lg-3"><div class="fee-stat"><strong style="color:var(--admin-success);">{{ $rows->count() - $unpaid }}</strong><span>Paid</span></div></div>
  <div class="col-6 col-lg-3"><div class="fee-stat"><strong style="color:#AE8225;">{{ $unpaid }}</strong><span>Not paid</span></div></div>
  <div class="col-6 col-lg-3"><div class="fee-stat"><strong style="color:var(--admin-danger);">{{ $overdue }}</strong><span>Overdue</span></div></div>
  <div class="col-6 col-lg-3">
    <div class="fee-stat text-start">
      @forelse($totals as $t)
        @php $s = new \App\Models\Student(['fee_currency' => $t['currency']]); @endphp
        <div class="small"><strong class="d-inline" style="font-size:1rem;">{{ $s->money($t['received']) }}</strong> <span>of {{ $s->money($t['expected']) }}</span></div>
      @empty
        <span>No fees set yet</span>
      @endforelse
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-body">
    @if($rows->isEmpty())
      <p class="text-center text-muted py-4 mb-0">No active student has a monthly fee yet. Open a student and set "Monthly fee".</p>
    @else
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="feesTable">
        <thead>
          <tr><th>Student</th><th>Fee</th><th>Due</th><th>Status</th><th class="text-end">Action</th></tr>
        </thead>
        <tbody>
          @foreach($rows as $r)
            @php $s = $r->student; @endphp
            <tr>
              <td><a href="{{ route('admin.students.edit', $s) }}#fees" class="fw-bold text-decoration-none" style="color:var(--admin-text);">{{ $s->name }}</a>
                @if($s->parent_name)<br><small class="text-muted">{{ $s->parent_name }}</small>@endif</td>
              <td>{{ $s->money($s->fee_amount) }}</td>
              <td data-order="{{ $r->due->timestamp }}">{{ $r->due->format('j M') }}</td>
              <td>
                @if($r->payment)
                  <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Paid {{ $r->payment->paid_on->format('j M') }}</span>
                @elseif($r->overdue)
                  <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Overdue</span>
                @else
                  <span class="badge" style="background:rgba(174,130,37,.12);color:#AE8225;">Not paid</span>
                @endif
              </td>
              <td class="text-end">
                <div class="d-flex justify-content-end gap-2">
                  @if($r->payment)
                    <form action="{{ route('admin.payments.destroy', $r->payment) }}" method="POST" class="d-inline js-confirm-delete" data-name="this payment">
                      @csrf @method('DELETE') <input type="hidden" name="return" value="fees">
                      <button class="btn btn-sm btn-light" type="submit" title="Undo"><i class="bi bi-arrow-counterclockwise"></i></button>
                    </form>
                  @else
                    @if($s->whatsappLink())
                      <a class="btn btn-sm btn-success" target="_blank" rel="noopener" href="{{ $s->whatsappLink($s->feeReminderMessage($month)) }}"><i class="bi bi-whatsapp"></i> Remind</a>
                    @endif
                    <form action="{{ route('admin.students.payments.store', $s) }}" method="POST" class="d-inline">
                      @csrf
                      <input type="hidden" name="return" value="fees">
                      <input type="hidden" name="month" value="{{ $month->format('Y-m') }}">
                      <input type="hidden" name="amount" value="{{ $s->fee_amount }}">
                      <input type="hidden" name="currency" value="{{ $s->fee_currency }}">
                      <input type="hidden" name="paid_on" value="{{ now(\App\Support\Timezones::ACADEMY)->toDateString() }}">
                      <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-check2"></i> Paid</button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</div>
@endsection

@push('styles')
<style>
  .fee-stat { padding:.9rem 1rem; border:1px solid var(--admin-border); border-radius:12px; text-align:center; background:var(--admin-surface); height:100%; }
  .fee-stat strong { display:block; font-size:1.6rem; line-height:1.1; }
  .fee-stat span { color:var(--admin-muted); font-size:.8rem; }
</style>
@endpush

@push('scripts')
<script>
$(function() { if (document.getElementById('feesTable')) initDatatables('#feesTable', { order: [], pageLength: 50 }); });
</script>
@endpush
