{{-- <h1>Welcome, {{ auth()->user()->name }}!</h1>
<p>You are logged in as {{ auth()->user()->role->name }}.</p> --}}


@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow text-center p-4">
            <i class="fa-solid fa-user-graduate fa-3x text-success"></i>
            <h4 class="mt-3">Welcome, {{ auth()->user()->name }}</h4>

            {{-- <a href="{{ route('student.attendance') }}" class="btn btn-primary mt-3"> --}}
                View Attendance
            </a>
        </div>
    </div>
</div>
@endsection
