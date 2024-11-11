@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Manage Parents</h1>
    <a href="{{ route('parents.create') }}" class="btn btn-primary  mb-3">Add Parent</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parents as $parent)
                <tr>
                    <td>{{ $parent->name }}</td>
                    <td>{{ $parent->email }}</td>
                    <td>
                        <a href="{{ route('parents.edit', $parent) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('parents.destroy', $parent) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection