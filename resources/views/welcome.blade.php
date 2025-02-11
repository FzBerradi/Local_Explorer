<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('{{ asset('images/météo ciel.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            text-align: center;
            margin: 0;
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0 15px;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover {
            color: #00796b;
            transform: scale(1.1);
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00796b;
        }

        /* Hero Section */
        header {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
            text-align: center;
        }

        header h1 {
            font-size: 3.5rem;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.5rem;
            margin: 20px 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .explore-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 40px;
            background-color: #00796b;
            color: #ffffff;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .explore-btn:hover {
            background-color: #00796b;
            transform: translateY(-5px);
        }

        /* Footer */
        footer {
            background-color: #222;
            padding: 20px 0;
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
            position: relative;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #00796b;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="logo">Local Explorer</div>
        <div class="nav-links">
            <a href="{{ route('landing') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('explore') }}">Explore</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header>
        <h1>Welcome to Local Explorer</h1>
        <p>Discover activities and experiences tailored to your location and the weather.</p>
        <a href="{{ route('explore') }}" class="explore-btn">Explore Now</a>
    </header>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Local Explorer. All Rights Reserved.</p>
        <p>Developed by <a href="#">Berradi</a></p>
    </footer>
</body>
</html>
