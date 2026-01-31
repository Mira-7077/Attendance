{{-- 
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>Your role: {{ auth()->user()->role->name }}</p>
</body>
</html> --}}


@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="card shadow">
    <div class="card-header bg-info text-white">
        Assigned Sections
    </div>

    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>Section</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>

            @foreach($assignments as $a)
            <tr>
                <td>{{ $a->section->name }}</td>
                <td>{{ $a->subject->name }}</td>
                <td>
                    <a href="{{ route('teacher.attendance.create', $a->id) }}" class="btn btn-sm btn-primary">
                        Take Attendance
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
