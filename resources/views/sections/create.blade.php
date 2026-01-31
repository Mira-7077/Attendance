@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Section</h3>

    <form method="POST" action="{{ route('sections.store') }}">
        @csrf

        <div class="mb-3">
            <label>Section Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Semester</label>
            <select name="semester_id" class="form-control" required>
                <option value="">-- Select Semester --</option>
                @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}">
                        {{ $semester->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
