<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Details</title>
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
            max-width: 500px;
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
        }
        a:hover {
            background-color: #6A00B8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Visitor Details</h1>
        <p><strong>Name:</strong> {{ $visitor->name }}</p>
        <p><strong>Phone:</strong> {{ $visitor->phone }}</p>
        <p><strong>Email:</strong> {{ $visitor->email ?? 'N/A' }}</p>
        <a href="{{ route('visitors.index') }}">Back to Visitor List</a>
    </div>
</body>
</html>
