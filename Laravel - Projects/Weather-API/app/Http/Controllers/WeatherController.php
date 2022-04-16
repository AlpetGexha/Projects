<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function __invoke($city)
    {
        $coordinates = config('weather.city_coordinates.'.$city);

        /**
         * Kujto Kordinatat per 5 minuta ne cache. Nese e kemi bere load një here kjo e ruan per 5 minta atë rezulatal edhe nëse kerkesa me API deshton
         */
        return Cache::remember('city:' . $city, 60 * 5, function () use ($coordinates) {
            $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude=' . $coordinates['lat'] . '&longitude=' . $coordinates['lng'] . '&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');
            // $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude=51.5002&longitude=-0.1262&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');

            // Determine if the status  code is 200 >= and < 300
            if ($response->successful()) {
                return $response->json('daily');
            }

            return $response->json([]);

            // dd()
        });
    }
}
