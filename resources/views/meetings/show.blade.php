<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Details</title>
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
            text-align: center;
        }
        h1 {
            font-size: 1.8rem;
            color: #4A007E;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
            font-size: 1rem;
            font-weight: 600;
            text-align: left;
        }
        p strong {
            color: #4A007E;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #4A007E;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }
        a:hover {
            background-color: #6A00B8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Meeting Details</h1>
        <p><strong>ID:</strong> {{ $meeting->id }}</p>
        <p><strong>Visitor:</strong> {{ $meeting->visitor->name }}</p>
        <p><strong>Employee:</strong> {{ $meeting->employee->name }}</p>
        <p><strong>Scheduled Time:</strong> {{ $meeting->scheduled_time }}</p>
        <p><strong>Type:</strong> {{ $meeting->type }}</p>
        <p><strong>Status:</strong> {{ ucfirst($meeting->status) }}</p>
        <a href="{{ route('meetings.index') }}">Back to Meeting List</a>
    </div>
</body>
</html>
