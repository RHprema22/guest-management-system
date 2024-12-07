<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
</head>
<body>
    <h1>Welcome to the Employee Dashboard</h1>
    <ul>
    <li><a href="{{ route('visitors.index') }}">Manage Visitors</a></li>
    <li><a href="{{ route('meetings.index') }}">Manage Meetings</a></li>
    <li>Meeting Summaries:</li>
    <ul>
        @foreach ($meetings as $meeting)
            <li>
                <a href="{{ route('meeting.summary.edit', $meeting->id) }}">
                    Edit Summary for Meeting #{{ $meeting->id }}
                </a>
            </li>
        @endforeach
    </ul>
</ul>


    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
