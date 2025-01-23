<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Local Explorer</title>
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

        /* About Section */
        .about-section {
            padding: 50px 20px;
            background-color: rgba(0, 0, 0, 0.7);
            margin: 40px 0;
            color: #ddd;
        }

        .about-section h2 {
            font-size: 2.5rem;
            color: #00796b;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .gallery-section {
            margin: 40px 0;
            padding: 20px;
        }

        .gallery-section h2 {
            font-size: 2.5rem;
            color: #00796b;
            margin-bottom: 20px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.05);
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
            <a href="{{ route('about') }}" class="active">About</a>
            <a href="{{ route('explore') }}">Explore</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header>
        <h1>About Local Explorer</h1>
        <p>We provide personalized travel and activity suggestions based on your location and weather conditions.</p>
    </header>

    <!-- About Section -->
    <section class="about-section">
        <h2>Our Mission</h2>
        <p>
            At Local Explorer, we aim to help you discover exciting local activities based on the weather and your preferences. Whether you're looking to explore the outdoors or find cozy indoor experiences, we provide tailored suggestions to suit your needs.
        </p>
        <h2>Why Choose Us?</h2>
        <p>
            We combine local knowledge with real-time weather data to offer unique activity ideas that enhance your experience. Our platform is easy to navigate, and we provide you with options that match your mood and environment. You’ll never run out of fun things to do in your area, no matter the weather.
        </p>
        <h2>How It Works</h2>
        <p>
            Simply input your location and preferred activity type, and we’ll provide you with a list of suggestions based on current weather conditions. We also offer recommendations for both indoor and outdoor activities, so you can always make the most of your surroundings.
        </p>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2>Our Gallery</h2>
        <div class="gallery">
            <img src="{{ asset('images/gallery1.jpg') }}" alt="Gallery Image 1">
            <img src="{{ asset('images/gallery3.jpg') }}" alt="Gallery Image 3">
            <img src="{{ asset('images/gallery2.png') }}" alt="Gallery Image 2">
            <img src="{{ asset('images/gallery33.jpg') }}" alt="Gallery Image 4">


        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Local Explorer. All Rights Reserved.</p>
        <p>Developed by <a href="#">Berradi</a></p>
    </footer>
</body>
</html>
