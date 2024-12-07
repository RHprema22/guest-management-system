<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Meeting Summary</title>
</head>
<body>
    <h1>Report: Monthly Meeting Summary</h1>
    <a href="{{ route('meetings.index') }}">Back to Meetings</a>

    <table border="1">
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Meetings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monthlyMeetings as $meeting)
                <tr>
                    <td>{{ $meeting->month }}</td>
                    <td>{{ $meeting->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
