<?php
/**
 * Created by IntelliJ IDEA.
 * User: impulse
 * Date: 2019-09-19
 * Time: 00:01
 */

namespace App\Http\Controllers;


use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Страница с погодой в Брянске
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $weatherData = $this->weatherService->getData();
        $temp = json_decode($weatherData)->fact->temp;
        return view('weather.index', ['temp' => $temp]);
    }
}
