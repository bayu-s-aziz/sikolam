<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class getRelayStatus extends Controller
{

    public function getRelayStatus($relayNumber)
    {
        $url = env('THINGER_API_URL_' . $relayNumber);
        $authToken = env('THINGER_API_TOKEN_' . $relayNumber);

        $client = new Client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Content-Type' => 'application/json;charset=UTF-8',
                    'Authorization' => 'Bearer ' . $authToken,
                ],
            ]);

            $status = (string) $response->getBody();
            return $status == 'true' ? true : false;
        } catch (\Exception $e) {
            // Handle errors here, such as device or network issues
            return false;
        }
    }
}
