@extends('layouts.app')

@section('title', 'Take Attendance')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-white">
        Take Attendance
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('teacher.attendance.store') }}">
            @csrf

            @foreach($students as $student)
                <div class="row mb-2">
                    <div class="col-md-6">
                        {{ $student->name }}
                    </div>
                    <div class="col-md-6">
                        <select name="attendance[{{ $student->id }}]" class="form-select">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                        </select>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-success mt-3">Save Attendance</button>
        </form>
    </div>
</div>
@endsection
