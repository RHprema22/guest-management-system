<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetings</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <!-- <h1>Welcome to the Page</h1> -->
@endsection
    <h1>Meeting List</h1>
    <a href="{{ route('meetings.create') }}">Schedule New Meeting</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Visitor</th>
                <th>Employee</th>
                <th>Scheduled Time</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->id }}</td>
                    <td>{{ $meeting->visitor->name }}</td>
                    <td>{{ $meeting->employee->name }}</td>
                    <td>{{ $meeting->scheduled_time }}</td>
                    <td>{{ $meeting->type }}</td>
                    <td>{{ ucfirst($meeting->status) }}</td>
                    <td>
                        <a href="{{ route('meetings.show', $meeting->id) }}">View</a>
                        <a href="{{ route('meetings.edit', $meeting->id) }}">Edit</a>
                        <a href="{{ route('meeting.summary.edit', $meeting->id) }}">Add/Edit Summary</a>
                        <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
