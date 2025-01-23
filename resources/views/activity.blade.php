<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestions d'Activités Locales</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Suggestions d'Activités Locales Basées sur la Météo</h1>

        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @else
            <div id="weather-result">
                <h3>{{ $weather['name'] }}</h3>
                <p><strong>Température :</strong> {{ $weather['main']['temp'] }}°C</p>
                <p><strong>Condition :</strong> {{ $weather['weather'][0]['description'] }}</p>
                <p><strong>Humidité :</strong> {{ $weather['main']['humidity'] }}%</p>
                <p><strong>Vitesse du vent :</strong> {{ $weather['wind']['speed'] }} m/s</p>
            </div>

            <h3>Suggestions d'Activités :</h3>
            <ul>
                @if(count($activities_suggestions) > 0)
                    @foreach($activities_suggestions as $activity)
                        <li>{{ $activity }}</li>
                    @endforeach
                @else
                    <li>Aucune suggestion disponible pour le moment.</li>
                @endif
            </ul>
        @endif
    </div>
</body>
</html>
