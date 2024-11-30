<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visitor</title>
</head>
<body>
    <h1>Edit Visitor</h1>
    <a href="{{ route('visitors.index') }}">Back to Visitor List</a>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $visitor->name) }}" required>
        <br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $visitor->phone) }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $visitor->email) }}">
        <br>

        <button type="submit">Update Visitor</button>
    </form>
</body>
</html>
