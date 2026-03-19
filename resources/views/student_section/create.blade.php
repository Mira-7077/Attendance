@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Assign Student to Section</h3>

    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('student-section.store') }}" method="POST">
        @csrf

        <div>
            <label>Select Student</label>
            <select name="student_id" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Select Section</label>
            <select name="section_id" required>
                <option value="">-- Select Section --</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <button type="submit">Assign</button>
    </form>

</div>
@endsection