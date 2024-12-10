<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4A007E;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 20px;
            width: 120px;
            height: auto;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: white;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        h1 {
            font-size: 1.8rem;
            color: #4A007E;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }
        input:focus {
            outline: none;
            border-color: #4A007E;
            box-shadow: 0 0 4px rgba(74, 0, 126, 0.5);
        }
        .error-message {
            color: red;
            font-weight: 600;
            text-align: center;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            background-color: #4A007E;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #6A00B8;
        }
        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        .footer a {
            color: #4A007E;
            text-decoration: none;
            font-weight: 600;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
    <div class="container">
        <h1>Login</h1>
        @if (session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="footer">
            <p>Don't have an account? <a href="#">Contact Admin</a></p>
        </div>
    </div>
</body>
</html>
