<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/ciel.jpg') }}') no-repeat center center fixed;;
            background-size: cover;
            background-position: center;
            color: white;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 90%;
            color: #333;
        }

        h1 {
            color: #00796b;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 20px;
        }

        button {
            padding: 15px 30px;
            background-color: #00796b;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #004d40;
            transform: translateY(-3px);
        }

        #loading {
            display: none;
            margin-top: 20px;
        }

        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #weather-result {
            display: none;
            margin-top: 20px;
        }

        #weather-result h3 {
            color: #00796b;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #weather-result p {
            font-size: 1.2rem;
            color: #333;
        }

        #activities-list {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
            list-style-type: none;
            padding-left: 0;
        }

        #activities-list li {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #333;
        }

        #activities-list li:before {
            content: "✔️";
            margin-right: 10px;
            color: #00796b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Explorateur Local</h1>
        <p>Découvrez des activités adaptées à votre météo locale !</p>
        <button onclick="getLocation()">Voir les suggestions</button>

        <div id="loading">
            <div class="spinner"></div>
            <p>Récupération des données météo...</p>
        </div>

        <div id="weather-result">
            <h3 id="location-name"></h3>
            <p><strong>Température :</strong> <span id="temperature"></span>°C</p>
            <p><strong>Condition :</strong> <span id="condition"></span></p>
            <p><strong>Humidité :</strong> <span id="humidity"></span>%</p>
            <p><strong>Vitesse du vent :</strong> <span id="wind-speed"></span> m/s</p>
        </div>

        <ul id="activities-list"></ul>
    </div>

    <script>
        function getLocation() {
            const loading = document.getElementById('loading');
            const weatherResult = document.getElementById('weather-result');
            const activitiesList = document.getElementById('activities-list');

            loading.style.display = 'block';
            weatherResult.style.display = 'none';
            activitiesList.style.display = 'none';
            activitiesList.innerHTML = ''; // Reset activities

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    fetch('/fetch-weather', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ latitude: lat, longitude: lon })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.weather) {
                            document.getElementById('location-name').textContent = data.weather.name;
                            document.getElementById('temperature').textContent = data.weather.main.temp;
                            document.getElementById('condition').textContent = data.weather.weather[0].description;
                            document.getElementById('humidity').textContent = data.weather.main.humidity;
                            document.getElementById('wind-speed').textContent = data.weather.wind.speed;

                            weatherResult.style.display = 'block';

                            // Display activities
                            if (data.activities_suggestions && data.activities_suggestions.length > 0) {
                                data.activities_suggestions.forEach(activity => {
                                    const li = document.createElement('li');
                                    li.textContent = activity;
                                    activitiesList.appendChild(li);
                                });
                            } else {
                                const li = document.createElement('li');
                                li.textContent = 'Aucune activité suggérée pour le moment.';
                                activitiesList.appendChild(li);
                            }

                            activitiesList.style.display = 'block';
                        } else {
                            alert('Aucune donnée disponible.');
                        }
                        loading.style.display = 'none';
                    })
                    .catch(error => {
                        alert("Erreur : " + error.message);
                        loading.style.display = 'none';
                    });
                });
            } else {
                alert("La géolocalisation n'est pas supportée par ce navigateur.");
                loading.style.display = 'none';
            }
        }
    </script>
</body>
</html>
