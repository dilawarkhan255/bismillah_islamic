@extends('admin.layouts.app')

@section('title', 'Free Trial Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Free Trial Details</h4>
    <a href="{{ route('admin.free-trials.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel mb-4">
            <div class="panel-header">
                <h5 class="mb-0">Trial Information</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Student Name</label>
                        <strong>{{ $freeTrial->student_name }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Parent Name</label>
                        <strong>{{ $freeTrial->parent_name }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Phone</label>
                        <strong>{{ $freeTrial->phone }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Email</label>
                        <strong>{{ $freeTrial->email ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Country</label>
                        <strong>{{ $freeTrial->country ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Age Range</label>
                        <strong>{{ $freeTrial->age_range ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Course</label>
                        <strong>{{ $freeTrial->course }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Preferred Time</label>
                        <strong>{{ $freeTrial->preferred_time ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Teacher Gender</label>
                        <strong>{{ $freeTrial->teacher_gender ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">WhatsApp Number</label>
                        <strong>{{ $freeTrial->whatsapp_number ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Status</label>
                        @if($freeTrial->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($freeTrial->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Date</label>
                        <strong>{{ $freeTrial->created_at->format('d M Y, h:i A') }}</strong>
                    </div>
                    @if($freeTrial->message)
                        <div class="col-12 mb-3">
                            <label class="text-muted small d-block">Message</label>
                            <p class="mb-0">{{ $freeTrial->message }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-header">
                <h5 class="mb-0">Update Status</h5>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.free-trials.status', $freeTrial) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="pending" {{ $freeTrial->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $freeTrial->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $freeTrial->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg"></i> Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection