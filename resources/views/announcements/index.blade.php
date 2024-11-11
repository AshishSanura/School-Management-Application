@extends('layouts.app')

@section('content')
<h1>Manage Announcements</h1>
<a href="{{ route('announcements.create') }}" class="btn btn-primary">Post New Announcement</a>
<table class="table">
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
@endsection