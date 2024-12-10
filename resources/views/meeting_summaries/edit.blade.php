<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meeting Summary</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #4A007E;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        a, button {
            text-decoration: none;
            color: white;
            background-color: #4A007E;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        a:hover, button:hover {
            background-color: #6A00B8;
        }
        .error-messages {
            color: red;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: 600;
        }
        textarea, input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }
        textarea:focus, input:focus {
            outline: none;
            border-color: #4A007E;
            box-shadow: 0 0 4px rgba(74, 0, 126, 0.5);
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4A007E;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #6A00B8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Meeting Summary</h1>
        <div class="buttons">
            <a href="{{ route('meetings.index') }}">Back to Meeting List</a>
        </div>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('meeting.summary.store', $meeting->id) }}" method="POST">
            @csrf

            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary" rows="5" required>{{ old('summary', $summary->summary ?? '') }}</textarea>

            <label for="progress">Progress:</label>
            <input type="text" id="progress" name="progress" value="{{ old('progress', $summary->progress ?? '') }}" required>

            <button type="submit">Save Summary</button>
        </form>
    </div>
</body>
</html>
