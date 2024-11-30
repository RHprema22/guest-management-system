<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Details</title>
</head>
<body>
    <h1>Meeting Details</h1>
    <a href="{{ route('meetings.index') }}">Back to Meeting List</a>

    <p><strong>ID:</strong> {{ $meeting->id }}</p>
    <p><strong>Visitor:</strong> {{ $meeting->visitor->name }}</p>
    <p><strong>Employee:</strong> {{ $meeting->employee->name }}</p>
    <p><strong>Scheduled Time:</strong> {{ $meeting->scheduled_time }}</p>
    <p><strong>Type:</strong> {{ $meeting->type }}</p>
    <p><strong>Status:</strong> {{ ucfirst($meeting->status) }}</p>
</body>
</html>
