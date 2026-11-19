@extends('admin.layouts.app')

@section('title', 'Enrollments')

@section('content')
<x-admin.page-header title="Enrollments" icon="bi-person-plus" eyebrow="Manage" subtitle="Enrollment requests submitted from the website."></x-admin.page-header>

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
                    @foreach($enrollments as $enrollment)
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
                                    <x-admin.delete-button :action="route('admin.enrollments.destroy', $enrollment)" :name="$enrollment->student_name" />
                                </div>
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
$(function() { initDatatables('#enrollmentsTable'); });
</script>
@endpush
