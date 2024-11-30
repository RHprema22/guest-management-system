<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitors</title>
</head>
<body>
    <h1>Visitor List</h1>
    <a href="{{ route('visitors.create') }}">Add Visitor</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>
                        <a href="{{ route('visitors.show', $visitor->id) }}">View</a>
                        <a href="{{ route('visitors.edit', $visitor->id) }}">Edit</a>
                        <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
