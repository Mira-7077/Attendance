


@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')


<div class="d-flex flex-wrap gap-2 mb-4">
    <a href="/teacher/dashboard" class="btn btn-outline-primary">
        <i class="fa-solid fa-chalkboard-user me-1"></i>
        Switch to Teacher View
    </a>

    <a href="{{ route('admin.attendance.index') }}" class="btn btn-primary">
        <i class="fa-solid fa-calendar-check me-1"></i>
        Manage Attendance
    </a>

    <a href="{{ route('admin.assignments.index') }}" class="btn btn-dark">
        <i class="fa-solid fa-user-plus me-1"></i>
        Assign Class to Teacher
    </a>
</div>

<a href="{{ route('student-section.index') }}">
    <button>Assign Student to Section</button>
</a>


<div class="row g-4">

    <div class="col-md-4">
        <a href="{{ route('admin.teachers.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-user-tie fa-3x text-primary"></i>
                <h5 class="mt-3 text-dark">Teachers</h5>
            </div>
        </a>
    </div>

    

    <div class="col-md-4">
        <a href="{{ route('admin.students.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-user-graduate fa-3x text-success"></i>
                <h5 class="mt-3 text-dark">Students</h5>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('sections.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-layer-group fa-3x text-warning"></i>
                <h5 class="mt-3 text-dark">Sections</h5>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.subjects.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-book fa-3x text-info"></i>
                <h5 class="mt-3 text-dark">Subjects</h5>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.semesters.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-calendar-days fa-3x text-secondary"></i>
                <h5 class="mt-3 text-dark">Semesters</h5>
            </div>
        </a>
    </div>

</div>

@endsection
