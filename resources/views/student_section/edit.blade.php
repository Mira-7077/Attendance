@extends('layouts.app')

@section('content')

<h2>Edit Assignment</h2>

<form action="{{ route('student-assignments.update', $assignment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Student:</label>
    <select name="student_id" required>
        @foreach($students as $student)
            <option value="{{ $student->id }}"
                {{ $assignment->student_id == $student->id ? 'selected' : '' }}>
                {{ $student->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Section:</label>
    <select name="section_id" required>
        @foreach($sections as $section)
            <option value="{{ $section->id }}"
                {{ $assignment->section_id == $section->id ? 'selected' : '' }}>
                {{ $section->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Update</button>
</form>

@endsection