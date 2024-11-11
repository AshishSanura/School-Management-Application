@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Students</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection