<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// Page d'accueil du site
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Page pour explorer les activités et suggestions
Route::get('/explore', [HomeController::class, 'index'])->name('explore');

// Route pour récupérer les données météo et générer des suggestions d'activités via POST
Route::post('/fetch-weather', [WeatherController::class, 'fetchWeatherAndSuggestActivities']);

