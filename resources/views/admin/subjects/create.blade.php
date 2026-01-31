@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Subject</h3>

    <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Subject Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
