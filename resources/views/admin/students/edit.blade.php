@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
