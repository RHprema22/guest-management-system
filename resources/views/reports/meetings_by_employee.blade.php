<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetings by Employee</title>
</head>
<body>
    <h1>Report: Meetings by Employee</h1>
    <a href="{{ route('meetings.index') }}">Back to Meetings</a>

    <table border="1">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total Meetings</th>
                <th>Meeting Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->meetings->count() }}</td>
                    <td>
                        <ul>
                            @foreach ($employee->meetings as $meeting)
                                <li>
                                    <strong>Meeting ID:</strong> {{ $meeting->id }} <br>
                                    <strong>Type:</strong> {{ $meeting->type }} <br>
                                    <strong>Scheduled Time:</strong> {{ $meeting->scheduled_time }} <br>
                                    <strong>Summary:</strong> 
                                    {{ $meeting->summary->summary ?? 'No summary available' }} <br>
                                    <strong>Progress:</strong> 
                                    {{ $meeting->summary->progress ?? 'No progress available' }}
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
