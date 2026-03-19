

@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="my-4">Edit Assign</h1>

    <form action="{{ route('admin.assignments.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" 
                        {{ $assignment->teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" 
                        {{ $assignment->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <label for="section_id" class="form-label">Section</label>
            <select name="section_id" id="section_id" class="form-control" required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" 
                        {{ $assignment->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Assignment</button>
        <a href="{{ route('admin.assignments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
