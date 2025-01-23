<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    // Récupérer la météo et suggérer des activités
    public function fetchWeatherAndSuggestActivities(Request $request)
    {
        $lat = $request->latitude;
        $lon = $request->longitude;

        // Récupérer les données météo depuis OpenWeather
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric";

        // Utilisation de Guzzle pour récupérer les données météo
        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Impossible de récupérer les données météo.'], 500);
        }

        $weatherData = $response->json();

        // Si la météo est récupérée avec succès, générer des suggestions d'activités
        return $this->generateActivitySuggestions($weatherData);
    }

    // Générer des suggestions d'activités basées sur la météo
    public function generateActivitySuggestions($weatherData)
    {
        $geminiApiKey = env('GEMINI_API_KEY');
        $client = new \GuzzleHttp\Client();

        // Préparer le texte de la requête pour Gemini
        $weatherText = "Given the following weather conditions, suggest some activities: Temperature: {$weatherData['main']['temp']}°C, Conditions: {$weatherData['weather'][0]['description']}, Time: " . now()->format('H:i');

        try {
            $response = $client->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent', [
                'query' => ['key' => $geminiApiKey],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $weatherText]
                            ]
                        ]
                    ]
                ],
            ]);

            // Vérification de la réponse de Gemini
            $responseBody = $response->getBody()->getContents();
            Log::info('Réponse brute de Gemini : ' . $responseBody); // Log de la réponse pour vérifier

            // Extraire les suggestions d'activités de la réponse brute
            $activitiesSuggestions = $this->extractActivitiesSuggestions($responseBody);

            // Retourner les suggestions d'activités dans une structure appropriée
            return response()->json([
                'weather' => $weatherData,
                'activities_suggestions' => $activitiesSuggestions
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'appel à l\'API Gemini: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Gemini: ' . $e->getMessage()], 500);
        }
    }
    private function extractActivitiesSuggestions($responseBody)
    {
        $data = json_decode($responseBody, true);

        if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
            $suggestionsText = $data['candidates'][0]['content']['parts'][0]['text'];

            // Divisez les suggestions par les sauts de ligne et supprimez les espaces superflus
            $suggestionsList = array_filter(array_map('trim', explode("\n", $suggestionsText)), fn($item) => !empty($item));

            return $suggestionsList; // Retourne un tableau
        }

        return []; // Retourne un tableau vide si aucune suggestion
    }


}
