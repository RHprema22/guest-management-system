<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Details</title>
</head>
<body>
    <h1>Visitor Details</h1>
    <a href="{{ route('visitors.index') }}">Back to Visitor List</a>

    <p><strong>Name:</strong> {{ $visitor->name }}</p>
    <p><strong>Phone:</strong> {{ $visitor->phone }}</p>
    <p><strong>Email:</strong> {{ $visitor->email ?? 'N/A' }}</p>
</body>
</html>
