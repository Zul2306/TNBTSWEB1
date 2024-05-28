<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index() {
        $apiKey = 'aa79d890f2e5419fbb885438242805';
        $city = 'Batu';
        $response = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=1");

        if ($response->successful()) {
            $weatherData = $response->json();

            if (!isset($weatherData['forecast'])) {
                return response()->json(['error' => 'Unexpected API response structure', 'response' => $weatherData], 500);
            }

            return view('Dashboard.index', ['weather' => $weatherData]);
        } else {
            return response()->json(['error' => 'Unable to retrieve weather data'], 500);
        }
    }
}
