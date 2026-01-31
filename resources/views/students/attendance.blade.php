@extends('layouts.app')

@section('title', 'My Attendance')

@section('content')
<div class="card shadow">
    <div class="card-header bg-secondary text-white">
        Attendance Record
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>

            @foreach($attendances as $a)
            <tr>
                <td>{{ $a->date }}</td>
                <td>{{ ucfirst($a->status) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
