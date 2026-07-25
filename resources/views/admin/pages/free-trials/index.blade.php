@extends('admin.layouts.app')

@section('title', 'Free Trials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Free Trials</h4>
</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="freeTrialsTable">
                <thead>
                    <tr>
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
$(function() { initDatatables('#freeTrialsTable'); });
</script>
@endpush
