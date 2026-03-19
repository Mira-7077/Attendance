@extends('layouts.app')

@section('content')
<div class="card shadow p-4">
    <h4>Attendance Records</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                
                <th>Student</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Action</th>
                <th>Detail</th>
                
            </tr>
        </thead>

        <tbody>
        @foreach($attendances as $attendance)
      
        
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->student->name }}</td>
                <td>{{ $attendance->assignment->section->name }}</td>
                <td>{{ $attendance->assignment->subject->name }}</td>
            
                
                
                <td>
                    <span class="badge bg-info">
                        {{ ucfirst($attendance->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.attendance.edit', $attendance) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>
                   
                </td>
            </tr>
            

        @endforeach
        </tbody>
    </table>
</div>
@endsection





{{-- <table class="table table-bordered mt-3">

<thead>
<tr>
    <th>Student</th>
    <th>Total Classes</th>
    <th>Days Present</th>
    <th>Attendance %</th>
</tr>
</thead>

<tbody>

@foreach($attendances as $studentAttendances)

@php
$total = $studentAttendances->count();
$present = $studentAttendances->where('status','present')->count();
$percent = $total > 0 ? round(($present/$total)*100) : 0;
@endphp

<tr>
    <td>{{ $studentAttendances->first()->student->name }}</td>
    <td>{{ $total }}</td>
    <td>{{ $present }}</td>
    <td>{{ $percent }}%</td>
</tr>


@endforeach

</tbody>
</table>

</div>

@endsection --}}