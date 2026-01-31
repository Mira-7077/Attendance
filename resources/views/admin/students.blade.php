@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="card shadow">
    <div class="card-header bg-success text-white">
        Students List
    </div>

    <div class="card-body">
        <table class="table table-striped">
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
</div>
@endsection
