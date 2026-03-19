
@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="my-4">Assign</h1>

    
    <a href="{{ route('admin.assignments.create') }}" class="btn btn-primary mb-3">Create Assignment</a>

    
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
            <tr>
                <td>{{ $assignment->id }}</td>
                <td>{{ $assignment->teacher->name ?? 'N/A' }}</td>
                <td>{{ $assignment->subject->name ?? 'N/A' }}</td>
                <td>{{ $assignment->section->name ?? 'N/A' }}</td>
                <td>
                    
                    <a href="{{ route('admin.assignments.edit', $assignment->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    
                    <form action="{{ route('admin.assignments.destroy', $assignment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this assignment?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

