<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Meeting</title>
</head>
<body>
    <h1>Schedule a New Meeting</h1>
    <a href="{{ route('meetings.index') }}">Back to Meeting List</a>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        <label for="visitor_id">Visitor:</label>
        <select name="visitor_id" id="visitor_id" required>
            <option value="" disabled selected>Select a visitor</option>
            @foreach ($visitors as $visitor)
                <option value="{{ $visitor->id }}">{{ $visitor->name }}</option>
            @endforeach
        </select>
        <br>

        <label for="employee_id">Employee:</label>
        <select name="employee_id" id="employee_id" required>
            <option value="" disabled selected>Select an employee</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <br>

        <label for="scheduled_time">Scheduled Time:</label>
        <input type="datetime-local" name="scheduled_time" id="scheduled_time" required>
        <br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required>
        <br>

        <button type="submit">Schedule Meeting</button>
    </form>
</body>
</html>
