@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Semesters</h3>

    <a href="{{ route('admin.semesters.create') }}" class="btn btn-primary mb-3">
        Add Semester
    </a>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
        </tr>

        @foreach($semesters as $semester)
        <tr>
            <td>{{ $semester->name }}</td>
            <td>{{ $semester->start_date }}</td>
            <td>{{ $semester->end_date }}</td>
            <td>
                <a href="{{ route('admin.semesters.edit', $semester) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.semesters.destroy', $semester) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
