@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Teachers List
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>

            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
