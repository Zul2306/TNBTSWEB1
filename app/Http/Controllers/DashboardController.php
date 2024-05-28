<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

class DashboardController extends Controller
{
    public function index() {
        return view ('Dashboard.index');
=======
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $apiKey = 'aa79d890f2e5419fbb885438242805';
        $city = 'London';
        $response = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=1");

        if ($response->successful()) {
            $weatherData = $response->json();

            if (!isset($weatherData['forecast'])) {
                return response()->json(['error' => 'Unexpected API response structure', 'response' => $weatherData], 500);
            }

            // Terjemahkan teks kondisi cuaca
            $weatherData['current']['condition']['text'] = $this->terjemahkanKondisiCuaca($weatherData['current']['condition']['text']);

            return view('Dashboard.index', ['weather' => $weatherData]);
        } else {
            return response()->json(['error' => 'Unable to retrieve weather data'], 500);
        }
    }

    private function terjemahkanKondisiCuaca($kondisi)
    {
        // Implementasikan logika terjemahan Anda di sini
        // Untuk sederhananya, mari kita anggap kita memiliki array pemetaan
        $terjemahan = [
            'Clear' => 'Cerah',
            'Partly cloudy' => 'Cerah berawan',
            'Cloudy' => 'Berawan',
            'Overcast' => 'Mendung',
            'Mist' => 'Kabut',
            'Patchy rain possible' => 'Hujan lokal mungkin',
            'Patchy snow possible' => 'Hujan salju lokal mungkin',
            'Patchy sleet possible' => 'Hujan salju lokal mungkin',
            'Patchy freezing drizzle possible' => 'Gerimis beku lokal mungkin',
            'Thundery outbreaks possible' => 'Kemungkinan ada petir',
            'Blowing snow' => 'Angin kencang dan salju',
            'Blizzard' => 'Badai salju',
            'Fog' => 'Kabut',
            'Freezing fog' => 'Kabut beku',
            'Patchy light drizzle' => 'Gerimis ringan lokal',
            'Light drizzle' => 'Gerimis ringan',
            'Freezing drizzle' => 'Gerimis beku',
            'Heavy freezing drizzle' => 'Gerimis beku berat',
            'Patchy light rain' => 'Hujan ringan lokal',
            'Light rain' => 'Hujan ringan',
            'Moderate rain at times' => 'Hujan sedang kadang-kadang',
            'Moderate rain' => 'Hujan sedang',
            'Heavy rain at times' => 'Hujan lebat kadang-kadang',
            'Heavy rain' => 'Hujan lebat',
            'Light freezing rain' => 'Hujan beku ringan',
            'Moderate or heavy freezing rain' => 'Hujan beku sedang atau berat',
            'Light sleet' => 'Salju ringan',
            'Moderate or heavy sleet' => 'Salju sedang atau berat',
            'Patchy light snow' => 'Salju ringan lokal',
            'Light snow' => 'Salju ringan',
            'Patchy moderate snow' => 'Salju sedang lokal',
            'Moderate snow' => 'Salju sedang',
            'Patchy heavy snow' => 'Salju lebat lokal',
            'Heavy snow' => 'Salju lebat',
            'Ice pellets' => 'Butiran es',
            'Light rain shower' => 'Hujan badai ringan',
            'Moderate or heavy rain shower' => 'Hujan badai sedang atau berat',
            'Torrential rain shower' => 'Hujan badai deras',
            'Light sleet showers' => 'Badai salju ringan',
            'Moderate or heavy sleet showers' => 'Badai salju sedang atau berat',
            'Light snow showers' => 'Badai salju ringan',
            'Moderate or heavy snow showers' => 'Badai salju sedang atau berat',
            // Tambahkan lebih banyak terjemahan jika diperlukan
        ];

        // Kembalikan teks yang diterjemahkan jika tersedia, jika tidak kembalikan teks asli
        return $terjemahan[$kondisi] ?? $kondisi;
>>>>>>> 03222e788866783e7c90586046813e770e978fb7
    }
}
