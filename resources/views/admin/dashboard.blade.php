<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 2rem;
            color: #4A007E;
        }
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            background-color: #4A007E;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #6A00B8;
        }
        form {
            margin-top: 20px;
        }
        button {
            background-color: #4A007E;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #6A00B8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="buttons">
            <a href="{{ route('employees.index') }}" class="button">Manage Employees</a>
            <a href="{{ route('reports.meetings_by_employee') }}" class="button">Meetings by Employee</a>
            <a href="{{ route('reports.meetings_by_type') }}" class="button">Meetings by Type</a>
            <a href="{{ route('reports.monthly_meetings') }}" class="button">Monthly Meeting Summary</a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
