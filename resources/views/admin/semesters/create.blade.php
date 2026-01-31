@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Semester</h3>

    <form method="POST" action="{{ route('admin.semesters.store') }}">
        @csrf

        <input type="text" name="name" class="form-control mb-2" placeholder="Semester Name">

        <input type="date" name="start_date" class="form-control mb-2">

        <input type="date" name="end_date" class="form-control mb-2">

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
