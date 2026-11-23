@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')
<x-admin.page-header title="Message Details" icon="bi-envelope" eyebrow="Messages" :back="route('admin.messages.index')">
  <x-admin.delete-button :action="route('admin.messages.destroy', $message)" :name="$message->name" label="Delete" />
</x-admin.page-header>

<div class="panel">
    <div class="panel-header">
        <h5 class="mb-0">{{ $message->name }}</h5>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Name</label>
                <strong>{{ $message->name }}</strong>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Email</label>
                <strong><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></strong>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Phone</label>
                <strong>{{ $message->phone ?? '-' }}</strong>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Inquiry</label>
                <strong>{{ $message->inquiry }}</strong>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Date</label>
                <strong>{{ $message->created_at->format('d M Y, h:i A') }}</strong>
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-muted small d-block">Status</label>
                @if($message->is_read)
                    <span class="badge bg-secondary">Read</span>
                @else
                    <span class="badge bg-primary">Unread</span>
                @endif
            </div>
            <div class="col-12 mb-3">
                <label class="text-muted small d-block">Message</label>
                <div class="border rounded p-3 message-body">
                    {!! nl2br(e($message->message)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection