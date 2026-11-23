@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<x-admin.page-header title="Messages" icon="bi-envelope" eyebrow="Manage" subtitle="Contact form messages from visitors.">
  <button type="button" class="btn btn-danger-soft js-bulk-delete" data-table="#messagesTable" data-form="bulkDeleteForm" disabled>
    <i class="bi bi-trash"></i> Delete selected <span class="js-bulk-count"></span>
  </button>
</x-admin.page-header>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="messagesTable">
                <thead>
                    <tr>
                        <th style="width:36px;"><input type="checkbox" class="form-check-input js-select-all" aria-label="Select all"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Inquiry</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td><input type="checkbox" class="form-check-input js-row-check" value="{{ $message->id }}" aria-label="Select"></td>
                            <td><strong>{{ $message->name }}</strong></td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->inquiry }}</td>
                            <td>{{ $message->created_at->format('d M Y') }}</td>
                            <td>
                                @if(!$message->is_read)
                                    <span class="badge" style="background:rgba(13,110,253,.12);color:#0d6efd;">Unread</span>
                                @else
                                    <span class="badge" style="background:rgba(108,117,125,.12);color:#6c757d;">Read</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-light"><i class="bi bi-eye"></i></a>
                                    <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="confirmDeleteForm('deleteForm{{ $message->id }}', @js($message->name))"><i class="bi bi-trash"></i></button>
                                </div>
                                <form id="deleteForm{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display:none;">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="bulkDeleteForm" action="{{ route('admin.messages.bulk-destroy') }}" method="POST" style="display:none;">
    @csrf @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(function() {
    var dt = initDatatables('#messagesTable', { order: [], columnDefs: [{ targets: 0, orderable: false, searchable: false }] });
    initBulkDelete(dt, 'message');
});
</script>
@endpush
