@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Section</h3>

    <form method="POST" action="{{ route('sections.update', $section->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Section Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $section->name }}"
                   required>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
