@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Subject</h3>

    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Subject Name</label>
            <input type="text" name="name"
                   value="{{ $subject->name }}"
                   class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
