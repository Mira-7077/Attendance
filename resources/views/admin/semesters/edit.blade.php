@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Semester</h3>

    <form method="POST" action="{{ route('admin.semesters.update', $semester) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $semester->name }}" class="form-control mb-2">

        <input type="date" name="start_date" value="{{ $semester->start_date }}" class="form-control mb-2">

        <input type="date" name="end_date" value="{{ $semester->end_date }}" class="form-control mb-2">

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
