{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students</h2>

    <a href="{{ route('admin.students.create') }}">Add Student</a>

    <table border="1" width="100%" class="mt-3">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
        </tr>
        @endforeach
        
    </table>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Students</h2>

        
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Student
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                     <td>
    <a href="{{ route('admin.students.edit', $student->id) }}"
       class="btn btn-sm btn-warning">
       Edit
    </a>

    <form action="{{ route('admin.students.destroy', $student->id) }}"
          method="POST"
          style="display:inline;">
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
        </tbody>
    </table>

</div>
@endsection

