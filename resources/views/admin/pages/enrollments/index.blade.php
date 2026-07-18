@extends('admin.layouts.app')

@section('title', 'Enrollments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Enrollments</h4>
</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="enrollmentsTable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Parent</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td><strong>{{ $enrollment->student_name }}</strong></td>
                            <td>{{ $enrollment->parent_name }}</td>
                            <td>{{ $enrollment->phone }}</td>
                            <td>{{ $enrollment->course }}</td>
                            <td>
                                @if($enrollment->status === 'pending')
                                    <span class="badge" style="background:rgba(174,130,37,.12);color:#AE8225;">Pending</span>
                                @elseif($enrollment->status === 'approved')
                                    <span class="badge" style="background:rgba(15,118,110,.12);color:var(--admin-success);">Approved</span>
                                @else
                                    <span class="badge" style="background:rgba(220,38,38,.12);color:var(--admin-danger);">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $enrollment->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.enrollments.show', $enrollment) }}" class="btn btn-sm btn-light"><i class="bi bi-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No enrollments found.</td>
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
$(function() { initDatatables('#enrollmentsTable'); });
</script>
@endpush
