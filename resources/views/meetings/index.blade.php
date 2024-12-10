<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            color: #4A007E;
            text-align: center;
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
        form {
            display: inline;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #4A007E;
            color: white;
        }
        .success-message {
            color: green;
            font-weight: 600;
            text-align: center;
        }
        .action-buttons {
            display: flex;
            flex-direction: column; /* Arrange buttons column-wise */
            gap: 8px; /* Add spacing between buttons */
        }
        .action-buttons a, .action-buttons button {
            display: inline-block;
            color: white;
            background-color: #4A007E;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            text-align: center;
        }
        .action-buttons a:hover, .action-buttons button:hover {
            background-color: #6A00B8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="buttons">
            <a href="{{ route('employee.dashboard') }}">Dashboard</a>
            <a href="{{ route('meetings.create') }}">Schedule New Meeting</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
        <h1>Meeting List</h1>
        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Visitor</th>
                    <th>Employee</th>
                    <th>Scheduled Time</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->id }}</td>
                        <td>{{ $meeting->visitor->name }}</td>
                        <td>{{ $meeting->employee->name }}</td>
                        <td>{{ $meeting->scheduled_time }}</td>
                        <td>{{ $meeting->type }}</td>
                        <td>{{ ucfirst($meeting->status) }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('meetings.show', $meeting->id) }}">View</a>
                            <a href="{{ route('meetings.edit', $meeting->id) }}">Edit</a>
                            <a href="{{ route('meeting.summary.edit', $meeting->id) }}">Add/Edit Summary</a>
                            <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
