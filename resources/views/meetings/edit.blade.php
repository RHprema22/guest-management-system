<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meeting</title>
</head>
<body>
    <h1>Edit Meeting</h1>
    <a href="{{ route('meetings.index') }}">Back to Meeting List</a>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="visitor_id">Visitor:</label>
        <select name="visitor_id" id="visitor_id" required>
            @foreach ($visitors as $visitor)
                <option value="{{ $visitor->id }}" {{ $visitor->id == $meeting->visitor_id ? 'selected' : '' }}>
                    {{ $visitor->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="employee_id">Employee:</label>
        <select name="employee_id" id="employee_id" required>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id == $meeting->employee_id ? 'selected' : '' }}>
                    {{ $employee->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="scheduled_time">Scheduled Time:</label>
        <input type="datetime-local" name="scheduled_time" id="scheduled_time" value="{{ $meeting->scheduled_time }}" required>
        <br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" value="{{ $meeting->type }}" required>
        <br>

        <button type="submit">Update Meeting</button>
    </form>
</body>
</html>
