<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Explorer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Explorateur Local</h1>
        <p>Découvrez des activités adaptées à votre météo locale !</p>

        <div id="weather-result">
            <h3>{{ $weather['name'] }}</h3>
            <p><strong>Température :</strong> {{ $weather['main']['temp'] }}°C</p>
            <p><strong>Condition :</strong> {{ $weather['weather'][0]['description'] }}</p>
            <p><strong>Humidité :</strong> {{ $weather['main']['humidity'] }}%</p>
            <p><strong>Vitesse du vent :</strong> {{ $weather['wind']['speed'] }} m/s</p>
        </div>

        <ul id="activities-list">
            @foreach ($activities_suggestions as $activity)
                <li>{{ $activity }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
