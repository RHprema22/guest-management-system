<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('employees.index') }}">Manage Employees</a></li>
        <li><a href="{{ route('reports.meetings_by_employee') }}">Meetings by Employee</a></li>
        <li><a href="{{ route('reports.meetings_by_type') }}">Meetings by Type</a></li>
        <li><a href="{{ route('reports.monthly_meetings') }}">Monthly Meeting Summary</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
