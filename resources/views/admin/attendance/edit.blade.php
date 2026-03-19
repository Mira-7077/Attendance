@extends('layouts.app')

@section('content')
<div class="card shadow p-4">
    <h4>Edit Attendance</h4>

    <p>
        Student: <strong>{{ $attendance->student->name }}</strong><br>
        Section: {{ $attendance->assignment->section->name }}<br>
        Subject: {{ $attendance->assignment->subject->name }}<br>
        Date: {{ $attendance->date }}
    </p>

    <form method="POST"
          action="{{ route('admin.attendance.update', $attendance) }}">
        @csrf
        @method('PUT')

        <select name="status" class="form-select mb-3">
            <option value="present" @selected($attendance->status=='present')>Present</option>
            <option value="absent" @selected($attendance->status=='absent')>Absent</option>
            <option value="late" @selected($attendance->status=='late')>Late</option>
        </select>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
