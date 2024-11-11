@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<h1>Add Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection