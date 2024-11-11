@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Teacher</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->password }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection