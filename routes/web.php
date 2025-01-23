<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

// Page d'accueil du site
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Page pour explorer les activités et suggestions
Route::get('/explore', [HomeController::class, 'index'])->name('explore');

// Route pour récupérer les données météo et générer des suggestions d'activités via POST
Route::post('/fetch-weather', [WeatherController::class, 'fetchWeatherAndSuggestActivities']);

// Optionnel : Si vous souhaitez une route GET pour récupérer directement les activités selon les coordonnées
Route::get('/activities/{lat}/{lon}', [WeatherController::class, 'generateActivitySuggestions'])->name('activities.suggestions');
