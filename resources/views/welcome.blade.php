<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #00796b;
            font-size: 2.5rem;
        }

        p {
            font-size: 1.2rem;
            color: #333;
        }

        .explore-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00796b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .explore-btn:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <h1>Welcome to Local Explorer</h1>
    <p>Discover activities and experiences tailored to your location and the weather.</p>
    <a href="{{ route('explore') }}" class="explore-btn">Explore</a>
</body>
</html>
