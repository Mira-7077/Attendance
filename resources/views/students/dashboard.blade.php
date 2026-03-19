
@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Welcome, {{ auth()->user()->name }}</h2>

    <div class="row g-4">

        
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <i class="fa-solid fa-chart-line fa-3x text-primary mb-2"></i>
                <h5>Attendance</h5>
                <h3>{{ $attendancePercent ?? 0 }}%</h3>
                <div class="progress mt-2" style="height: 15px;">
                    <div class="progress-bar bg-success" role="progressbar" 
                        style="width: {{ $attendancePercent ?? 0 }}%;">
                    </div>
                </div>
                
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <i class="fa-solid fa-book fa-3x text-warning mb-2"></i>
                <h5>Total Subjects</h5>
                <h3>{{ $totalSubjects ?? 0 }}</h3>
                <small class="text-muted">Enrolled</small>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <i class="fa-solid fa-calendar-check fa-3x text-success mb-2"></i>
                <h5>Classes Attended</h5>
                <h3>{{ $classesAttended ?? 0 }}</h3>
                <small class="text-muted">Total</small>
            </div>
        </div>

    </div>

    
    <div class="text-center mt-5">
        <a href="{{ route('student.attendance.index') }}" class="btn btn-primary btn-lg">
            View My Attendance
        </a>
    </div>

   
<div class="mb-4">

    <a href="{{ url('/student/leaves') }}" class="btn btn-outline-primary me-2">
        My Leave Requests
    </a>

    <a href="{{ url('/student/leaves/create') }}" class="btn btn-primary">
        Request Leave
    </a>

</div>

</div>
@endsection
