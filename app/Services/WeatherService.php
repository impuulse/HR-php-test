<?php
/**
 * Created by IntelliJ IDEA.
 * User: impulse
 * Date: 2019-09-19
 * Time: 00:24
 */

namespace App\Services;


use GuzzleHttp\Client;

class WeatherService
{
    public function getData()
    {
        $client = new Client();
        $response = $client->get('https://api.weather.yandex.ru/v1/forecast/', [
            'query' => [
                'lat' => '53.279267854794945',
                'lon' => '34.37429449999997'
            ],
            'headers' => [
                'X-Yandex-API-Key' => '93e37621-38b0-4bea-ba6f-bf9fc741c369'
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
