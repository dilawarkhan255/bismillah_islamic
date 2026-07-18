@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Messages</h4>
</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="messagesTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Inquiry</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
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
                                    <button class="btn btn-sm btn-light" style="color:var(--admin-danger);" onclick="document.getElementById('deleteForm{{ $message->id }}').submit()"><i class="bi bi-trash"></i></button>
                                </div>
                                <form id="deleteForm{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display:none;">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() { initDatatables('#messagesTable'); });
</script>
@endpush
