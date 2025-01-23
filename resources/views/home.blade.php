<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f8f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            color: #00796b;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
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
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #004d40;
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
        }

        #activities-list {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background: #f7f7f7;
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

        <ul id="activities-list">
            <!-- Suggestions d'activités ajoutées dynamiquement -->
        </ul>
    </div>

    <script>
        function getLocation() {
            const loading = document.getElementById('loading');
            const weatherResult = document.getElementById('weather-result');
            const activitiesList = document.getElementById('activities-list');

            loading.style.display = 'block';
            weatherResult.style.display = 'none';
            activitiesList.style.display = 'none';

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
                        console.log(data);

                        if (data.weather && data.activities_suggestions) {
                            const weather = data.weather;
                            const activities = data.activities_suggestions;

                            document.getElementById('location-name').textContent = weather.name;
                            document.getElementById('temperature').textContent = weather.main.temp;
                            document.getElementById('condition').textContent = weather.weather[0].description;
                            document.getElementById('humidity').textContent = weather.main.humidity;
                            document.getElementById('wind-speed').textContent = weather.wind.speed;

                            activitiesList.innerHTML = activities.length > 0
                                ? activities.map(activity => `<li>${activity}</li>`).join('')
                                : '<li>Aucune suggestion d\'activité disponible pour le moment.</li>';
                            activitiesList.style.display = 'block';
                        } else {
                            alert('Données météo ou suggestions d\'activités indisponibles.');
                        }

                        loading.style.display = 'none';
                        weatherResult.style.display = 'block';
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
