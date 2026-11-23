@extends('admin.layouts.app')

@section('title', 'Free Trials')

@section('content')
<x-admin.page-header title="Free Trials" icon="bi-calendar-check" eyebrow="Manage" subtitle="Free trial class requests submitted from the website.">
  <button type="button" class="btn btn-danger-soft js-bulk-delete" data-table="#freeTrialsTable" data-form="bulkDeleteForm" disabled>
    <i class="bi bi-trash"></i> Delete selected <span class="js-bulk-count"></span>
  </button>
</x-admin.page-header>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="freeTrialsTable">
                <thead>
                    <tr>
                        <th style="width:36px;"><input type="checkbox" class="form-check-input js-select-all" aria-label="Select all"></th>
                        <th>Student</th>
                        <th>Parent</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($freeTrials as $trial)
                        <tr>
                            <td><input type="checkbox" class="form-check-input js-row-check" value="{{ $trial->id }}" aria-label="Select"></td>
                            <td><strong>{{ $trial->student_name }}</strong></td>
                            <td>{{ $trial->parent_name }}</td>
                            <td>{{ $trial->phone }}</td>
                            <td>{{ $trial->country ?? '-' }}</td>
                            <td>{{ $trial->course }}</td>
                            <td>
                                @if($trial->status === 'pending')
                                    <span class="badge" style="background:rgba(174,130,37,.12);color:#AE8225;">Pending</span>
                                @elseif($trial->status === 'approved')
                                    <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Approved</span>
                                @else
                                    <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $trial->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.free-trials.show', $trial) }}" class="btn btn-sm btn-light"><i class="bi bi-eye"></i></a>
                                    <x-admin.delete-button :action="route('admin.free-trials.destroy', $trial)" :name="$trial->student_name" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="bulkDeleteForm" action="{{ route('admin.free-trials.bulk-destroy') }}" method="POST" style="display:none;">
    @csrf @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(function() {
    var dt = initDatatables('#freeTrialsTable', { order: [], columnDefs: [{ targets: 0, orderable: false, searchable: false }] });
    initBulkDelete(dt, 'free trial request');
});
</script>
@endpush
