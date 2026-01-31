@extends('layouts.app')

@section('title', 'Sections')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning">
        Sections
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Section Name</th>
            </tr>

            @foreach($sections as $section)
            <tr>
                <td>{{ $section->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
