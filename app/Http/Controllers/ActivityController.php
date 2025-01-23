<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActivityController extends Controller
{
    public function generateActivities(Request $request)
    {
        $weatherData = $request->input('weatherData');

        // Créer un prompt pour GPT-3/4 basé sur les données météo
        $prompt = "Générer des suggestions d'activités en fonction de la météo : " . json_encode($weatherData);

        // Appel à l'API OpenAI pour générer des suggestions d'activités
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/completions', [
            'model' => 'gpt-3.5-turbo',  // Ou 'gpt-3.5-turbo'
            'prompt' => $prompt,
            'max_tokens' => 150,
            'temperature' => 0.7,
        ]);

        // Vérifier si la réponse est correcte
        $data = $response->json();
        if (isset($data['error'])) {
            return response()->json(['error' => 'Erreur lors de l\'appel API: ' . $data['error']['message']]);
        }

        // S'assurer que les suggestions sont présentes dans la réponse
        if (isset($data['choices'][0]['text'])) {
            $suggestions = explode("\n", $data['choices'][0]['text']); // Split suggestions into array
            return response()->json(['suggestions' => $suggestions]);
        }

        return response()->json(['error' => 'Aucune suggestion générée']);
    }


    private function generatePromptBasedOnWeather($weatherData)
    {
        // Exemple de génération d'un prompt
        return "Génère une liste d'activités intéressantes en fonction de la météo suivante : " . json_encode($weatherData);
    }
}
