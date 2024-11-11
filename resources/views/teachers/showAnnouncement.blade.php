@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Announcements</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Message</th>
                <th>Target</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->message }}</td>
                    <td>{{ $announcement->target }}</td>
                    <td>{{ $announcement->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection