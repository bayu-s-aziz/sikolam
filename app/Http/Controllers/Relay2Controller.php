<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Lampu; // Pastikan model Lampu2 sudah ada dan terkoneksi dengan tabel 'lampu_2'

class Relay2Controller extends Controller
{
    public function toggleRelay2(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);

        // Update status di database
        $lampu2 = Lampu::find(2);;
        if (!$lampu2) {
            return redirect()
                ->back()
                ->with('error', 'Lampu tidak ditemukan di database');
        }
        $lampu2->status = $request->input('status');
        $lampu2->save();

        // Kirimkan status ke API
        $status = $request->input('status') ? 'true' : 'false';
        $url = $lampu2->api_url;
        $authToken = $lampu2->api_token;

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
            // Handle error
            $message = $e->getMessage();
            if (str_contains($message, 'Client error')) {
                $message = 'Device SIKOLAM Not Connected';
            } elseif (str_contains($message, 'Server error')) {
                $message = 'Server error. Please try again later';
            }

            return redirect()
                ->back()
                ->with('error', $message);
        }
    }
}
