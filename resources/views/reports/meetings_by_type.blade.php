<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetings by Type</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <!-- <h1>Welcome to the Page</h1> -->
@endsection
    <h1>Report: Meetings Grouped by Type</h1>
    <a href="{{ route('meetings.index') }}">Back to Meetings</a>

    <table border="1">
        <thead>
            <tr>
                <th>Meeting Type</th>
                <th>Total Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetingsByType as $meeting)
                <tr>
                    <td>{{ $meeting->type }}</td>
                    <td>{{ $meeting->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
