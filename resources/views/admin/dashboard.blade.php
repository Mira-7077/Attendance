
@extends('layouts.app')

@section('title', 'Admin Dashboard') 

@section('content')
<div class="row g-4">

    
    <div class="col-md-4">
        <a href="{{ route('admin.teachers.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-user-tie fa-3x text-primary"></i>
                <h5 class="mt-3">Teachers</h5>
            </div>
        </a>
    </div>

    
    <div class="col-md-4">
        <a href="{{ route('admin.students.index') }}" class="text-decoration-none">
            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-user-graduate fa-3x text-success"></i>
                <h5 class="mt-3">Students</h5>
            </div>
        </a>
    </div>

    
    {{-- <div class="col-md-4">
      
            <a href="{{ route('sections.index') }}">

            <div class="card shadow p-4 text-center h-100">
                <i class="fa-solid fa-layer-group fa-3x text-warning"></i>
                <h5 class="mt-3">Sections</h5>
            </div>
        </a>
    </div> --}}

    <div class="col-md-4">
    <div class="card shadow p-4 text-center h-100">
        <a href="{{ route('sections.index') }}" class="text-decoration-none">
            <i class="fa-solid fa-layer-group fa-3x text-warning"></i>
            <h5 class="mt-3">Sections</h5>
        </a>
    </div>
</div>


    
    <div class="col-md-4">
    <a href="{{ route('admin.subjects.index') }}" class="text-decoration-none">
        <div class="card shadow p-4 text-center h-100">
            <i class="fa-solid fa-book fa-3x text-info"></i>
            <h5 class="mt-3">Subjects</h5>
        </div>
    </a>
</div>

    <a href="{{ route('admin.semesters.index') }}" class="text-decoration-none d-block"> 
        <div class="card shadow p-4 text-center h-100">
            <i class="fa-solid fa-calendar-days fa-3x text-info"></i>
            <h5 class="mt-3 text-dark">Semesters</h5>
        </div>
    </a>
</div>
</div>
@endsection
