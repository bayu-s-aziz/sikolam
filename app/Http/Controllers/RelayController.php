<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RelayController extends Controller
{


    public function toggleRelay1(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);

        $status = $request->input('status') ? 'true' : 'false';
        $url = env('THINGER_API_URL_1');
        $authToken = env('THINGER_API_TOKEN_1');

        $client = new Client();

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json;charset=UTF-8',
                    'Authorization' => 'Bearer ' . $authToken,
                ],
                'body' => $status,
            ]);

            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Relay 1 operation failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function getRelay1Status()
    {
        $url = env('THINGER_API_URL_1');
        $authToken = env('THINGER_API_TOKEN_1');

        $client = new Client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $authToken,
                ],
            ]);

            $status = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'status' => $status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch relay status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
