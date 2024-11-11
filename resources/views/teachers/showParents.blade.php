@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Parents</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parents as $parent)
                <tr>
                    <td>{{ $parent->name }}</td>
                    <td>{{ $parent->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection