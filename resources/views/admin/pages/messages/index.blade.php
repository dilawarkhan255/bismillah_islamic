@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<x-admin.page-header title="Messages" icon="bi-envelope" eyebrow="Manage" subtitle="Contact form messages from visitors."></x-admin.page-header>

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
                    @foreach($messages as $message)
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
@endsection

@push('scripts')
<script>
$(function() { initDatatables('#messagesTable'); });
</script>
@endpush
