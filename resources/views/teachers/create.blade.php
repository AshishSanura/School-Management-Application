@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Teacher</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                required>
        </div>
        <button type="submit" class="btn btn-success">Add Teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection