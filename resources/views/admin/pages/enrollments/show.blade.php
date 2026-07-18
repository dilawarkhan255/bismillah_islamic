@extends('admin.layouts.app')

@section('title', 'Enrollment Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Enrollment Details</h4>
    <a href="{{ route('admin.enrollments.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel mb-4">
            <div class="panel-header">
                <h5 class="mb-0">Student Information</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Student Name</label>
                        <strong>{{ $enrollment->student_name }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Parent Name</label>
                        <strong>{{ $enrollment->parent_name }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Phone</label>
                        <strong>{{ $enrollment->phone }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Email</label>
                        <strong>{{ $enrollment->email ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Age</label>
                        <strong>{{ $enrollment->age ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Gender</label>
                        <strong>{{ $enrollment->gender ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Course</label>
                        <strong>{{ $enrollment->course }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Class Type</label>
                        <strong>{{ $enrollment->class_type ?? '-' }}</strong>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Status</label>
                        @if($enrollment->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($enrollment->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted small d-block">Date</label>
                        <strong>{{ $enrollment->created_at->format('d M Y, h:i A') }}</strong>
                    </div>
                    @if($enrollment->message)
                        <div class="col-12 mb-3">
                            <label class="text-muted small d-block">Message</label>
                            <p class="mb-0">{{ $enrollment->message }}</p>
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
                <form action="{{ route('admin.enrollments.status', $enrollment) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="pending" {{ $enrollment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $enrollment->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $enrollment->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
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