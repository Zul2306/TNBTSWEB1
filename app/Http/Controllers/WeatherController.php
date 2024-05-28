<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = 'aa79d890f2e5419fbb885438242805'; // Ganti dengan API key Anda dari WeatherAPI
        $city = 'Probolinggo'; // Nama kota yang ingin Anda ambil datanya
        $response = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=1");

        if ($response->successful()) {
            $weatherData = $response->json();

            // Debug respons API
            if (!isset($weatherData['forecast'])) {
                return response()->json(['error' => 'Unexpected API response structure', 'response' => $weatherData], 500);
            }

            return view('weather', ['weather' => $weatherData]);
        } else {
            // Tangani error di sini
            return response()->json(['error' => 'Unable to retrieve weather data'], 500);
        }
    }
}
