@extends('layouts.app')

@section('content')
<div class="card p-4 shadow">
    <h4>Assign Class to Teacher</h4>

    <form method="POST" action="{{ route('admin.assignments.store') }}">
        @csrf

        <div class="mb-3">
            <label>Teacher</label>
            <select name="teacher_id" class="form-select">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-select">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Section</label>
            <select name="section_id" class="form-select">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Assign</button>
    </form>
</div>
@endsection
