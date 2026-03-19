@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Teacher Dashboard</h3>

    @if($assignments->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->subject->name }}</td>
                        <td>{{ $assignment->section->name }}</td>
                        <td>
                            <a href="{{ route('teacher.attendance.create', $assignment->id) }}"
                               class="btn btn-primary btn-sm">
                                Take Attendance
                            </a>
                        </td>
                    </tr>
                      @endforeach
                    <a href="/teacher/leaves">Leave Requests</a>
            
            </tbody>
        </table>
    @else
        <p>No class assigned.</p>
    @endif

</div>
@endsection
