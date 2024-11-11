@extends('layouts.app')

@section('title', 'Edit Parent')

@section('content')
<h1>Edit Parent</h1>

<form action="{{ route('parents.update', $parent) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $parent->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $parent->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection