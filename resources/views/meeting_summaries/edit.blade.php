<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meeting Summary</title>
</head>
<body>
    <h1>Edit Meeting Summary</h1>
    <a href="{{ route('meetings.index') }}">Back to Meeting List</a>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('meeting.summary.store', $meeting->id) }}" method="POST">
        @csrf

        <label for="summary">Summary:</label>
        <textarea id="summary" name="summary" rows="5" cols="40" required>{{ old('summary', $summary->summary ?? '') }}</textarea>
        <br>

        <label for="progress">Progress:</label>
        <input type="text" id="progress" name="progress" value="{{ old('progress', $summary->progress ?? '') }}" required>
        <br>

        <button type="submit">Save Summary</button>
    </form>
</body>
</html>
