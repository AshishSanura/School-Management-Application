@extends('layouts.app')

@section('content')
<h1>Create Announcement</h1>
<form action="{{ route('announcements.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
    </div>

    <div class="form-group">
        <label for="target">Target Audience</label>
        <select name="target" id="target" class="form-control" required>
            <option value="student">Students</option>
            <option value="parent">Parents</option>
            <option value="both">Both</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Post Announcement</button>
</form>
@endsection