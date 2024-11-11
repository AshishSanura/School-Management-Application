@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection