@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
<div class="container">
    <h1>Subjects</h1>
    <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
            
                <td>
                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
