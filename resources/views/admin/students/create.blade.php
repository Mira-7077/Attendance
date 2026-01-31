@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Student</h2>

    <form method="POST" action="{{ route('admin.students.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Create</button>
    </form>
</div>
@endsection
