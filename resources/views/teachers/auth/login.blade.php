@extends('layouts.app')

@section('content')
<h1>Teacher Login</h1>
<form method="POST" action="{{ route('teacher.login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection