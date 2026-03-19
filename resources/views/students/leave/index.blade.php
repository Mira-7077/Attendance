
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">My Leave Requests</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Leave Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($leaves as $leave)

                <tr>
                    <td>{{ $leave->leave_date }}</td>

                    <td>{{ $leave->reason }}</td>

                    <td>
                        @if($leave->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>

                        @elseif($leave->status == 'approved')
                            <span class="badge bg-success">Approved</span>

                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="3" class="text-center text-muted">
                        You have not submitted any leave requests yet.
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection