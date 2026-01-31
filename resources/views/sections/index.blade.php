@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Sections</h3>

    <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">
        Add Section
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $section->name }}</td>
                    <td>
                        <a href="{{ route('sections.edit', $section->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('sections.destroy', $section->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this section?')">
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
