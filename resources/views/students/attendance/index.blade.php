
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">My Attendance</h2>

    
    <div class="mb-3 w-50">
        <input type="text" id="search" class="form-control" placeholder="Search by subject or section">
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->assignment->section->name }}</td>
                                <td>{{ $attendance->assignment->subject->name }}</td>
                                <td>
                                    @if($attendance->status == 'present')
                                        <span class="badge bg-success">Present</span>
                                    @elseif($attendance->status == 'absent')
                                        <span class="badge bg-danger">Absent</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ ucfirst($attendance->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No attendance found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

          
<script>
document.getElementById('search').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        let section = row.cells[1].textContent.toLowerCase();
        let subject = row.cells[2].textContent.toLowerCase();
        row.style.display = (section.includes(filter) || subject.includes(filter)) ? '' : 'none';
    });
});
</script>

@endsection