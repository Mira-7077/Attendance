@extends('layouts.app')

@section('content')

<h2>My Attendance</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Date</th>
        <th>Section</th>
        <th>Subject</th>
        <th>Status</th>
    </tr>

    @forelse($attendances as $attendance)
        <tr>
            <td>{{ $attendance->date }}</td>
            <td>{{ $attendance->assignment->section->name }}</td>
            <td>{{ $attendance->assignment->subject->name }}</td>
            <td>{{ ucfirst($attendance->status) }}</td> 
            {{-- make letter capital --}}
        </tr>
    @empty
        <tr>
            <td colspan="4">No attendance found.</td>
        </tr>
    @endforelse
</table>

@endsection