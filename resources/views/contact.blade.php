<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('{{ asset('images/météo ciel.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
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
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00796b;
        }

        header {
            text-align: center;
            padding: 50px 20px;
        }

        header h1 {
            font-size: 3.5rem;
            color: #00796b;
            margin-bottom: 20px;
        }

        header p {
            font-size: 1.5rem;
        }

        .contact-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 50px auto;
            width: 80%;
            max-width: 1200px;
        }

        .contact-container h2 {
            color: #00796b;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .contact-info {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 50px;
        }

        .contact-info p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .contact-info a {
            color: #00796b;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        form input,
        form textarea,
        form button {
            width: 100%;
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        form input:focus,
        form textarea:focus {
            outline: none;
            border-color: #00796b;
        }

        form button {
            background-color: #00796b;
            color: #ffffff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #00796b;
        }

        .map-container {
            margin-top: 50px;
            border-radius: 10px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        footer {
            background-color: #222;
            padding: 20px;
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
            position: relative;
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
            <a href="{{ route('contact') }}" class="active">Contact</a>
        </div>
    </nav>

    <!-- Header Section -->
    <header>
        <h1>Contact Us</h1>
        <p>Have questions? We'd love to hear from you!</p>
    </header>

    <!-- Contact Section -->
    <div class="contact-container">

        <!-- Contact Form -->
        <form action="#" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
            <button type="submit">Send Message</button>
        </form>
        <!-- Map Section -->
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9531127464093!2d-122.08424908468242!3d37.42199977982452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5e0bc2f28b3%3A0x4b73f4b67df4a51b!2sGoogleplex!5e0!3m2!1sen!2sus!4v1620109362714!5m2!1sen!2sus"
                allowfullscreen=""
                loading="lazy"></iframe>
        </div>
    </div>
    <script>
        function initMap() {
            // Les coordonnées pour centrer la carte
            const location = { lat: 37.421999, lng: -122.084249 };

            // Initialisation de la carte
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location,
            });

            // Ajouter un marqueur
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Local Explorer Office",
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <!-- Footer -->
    <footer>
          <!-- Contact Information -->
  <div class="contact-info">
    <h2>Contact Information</h2>
    <p><strong>Email:</strong> <a href="mailto:info@localexplorer.com">info@localexplorer.com</a></p>
    <p><strong>Phone:</strong> <a href="tel:+123456789">+212 56789101</a></p>
    <p><strong>Address:</strong> 123 Adventure Street, Wanderlust City</p>
</div>
        <p>&copy; 2025 Local Explorer. All Rights Reserved.</p>
        <p>Developed by <a href="#">Berradi</a></p>
    </footer>
</body>
</html>
