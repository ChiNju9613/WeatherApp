<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        return view('weather');
    }

    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string'
        ]);

        $data = $this->weatherService
                     ->getWeather($request->city);

        return view('weather', compact('data'));
    }
}