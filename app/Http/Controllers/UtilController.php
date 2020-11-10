<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class UtilController extends Controller
{
    static public function modelNotFound($id, $title, $modelObject)
    {
        $data = [];
        $data['title'] = $title;
        $data['errorMsg'] = $modelObject
        . $id 
        . __('messages.util.modelNotFound.notFound');
        $xApiKey = config('services.cat.key');
        $uri = 'https://api.thecatapi.com/v1/images/search';
        $headers = ['x-api-key' => $xApiKey,];
        $body = [
            'limit' => 1,
            'size' => 'full',
        ];
        $client = new Client();
        $response = $client->get($uri, 
        ['form_params' => $body]);
        $responseBody = json_decode($response->getBody(), true);
        $data['imgUrl'] = $responseBody[0]["url"];
        return View('util.modelNotFound')->with("data", $data);
    }
    static public function weather()
    {
        $city = 'medellin';
        $xApiKey = '307471f02e1184b4432b66c754b4cfe6';
        $uri = 'http://api.openweathermap.org/data/2.5/weather';
        $body = [
            'q' => $city,
            'appid' => '307471f02e1184b4432b66c754b4cfe6',
            'units' => 'metric',
        ];
        $client = new Client();
        $response = $client->request('GET', $uri, [
            'query' => $body
        ]);
        $data = json_decode($response->getBody(), true);

        return $data['name'] . ' ' . $data['main']['temp'] . 'º ' . $data['weather'][0]['main'];
    }
}
