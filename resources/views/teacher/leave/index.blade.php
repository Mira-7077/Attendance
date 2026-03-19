
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Student Leave Requests</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Student</th>
                        <th>Title</th>
                        <th>Reason</th>
                        <th>Leave Date</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>

                <tbody>
                @forelse($leaves as $leave)

                <tr>

                    <td>
                        {{ $leave->student->name ?? 'Unknown' }}
                    </td>

                    <td>{{ $leave->title }}</td>

                    <td>{{ $leave->reason }}</td>

                    <td>{{ $leave->leave_date }}</td>

                    <td>

                        @if($leave->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($leave->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif

                    </td>

                    <td>

                        @if($leave->status == 'pending')

                        <a href="/teacher/leaves/{{ $leave->id }}/approve"
                           class="btn btn-success btn-sm">
                           Approve
                        </a>

                        <a href="/teacher/leaves/{{ $leave->id }}/reject"
                           class="btn btn-danger btn-sm">
                           Reject
                        </a>

                        @else
                            {{-- <span class="text-muted">No Action</span> --}}
                        @endif

                    </td>

                </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No leave requests found
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection