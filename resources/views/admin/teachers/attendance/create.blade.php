@extends('layouts.teacher')

@section('content')
<div class="container">

    <h4 class="mb-3">
        Attendance –
        {{ $assignment->subject->name }}
        ({{ $assignment->section->name }})
    </h4>

    <p><strong>Date:</strong> {{ $today }}</p>

    <form method="POST" action="{{ route('teacher.attendance.store') }}">
        @csrf

        <input type="hidden"
               name="teacher_subject_section_id"
               value="{{ $assignment->id }}">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <select name="attendance[{{ $student->id }}]"
                                    class="form-select">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="late">Late</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-success">
            Save Attendance
        </button>
    </form>

</div>
@endsection
