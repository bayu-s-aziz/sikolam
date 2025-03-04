<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Lampu; // Pastikan model Lampu3 sudah ada dan terkoneksi dengan tabel 'lampu_3'

class Relay3Controller extends Controller
{
    public function toggleRelay3(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);

        // Update status di database
        $lampu3 = Lampu::find(3);;
        if (!$lampu3) {
            return redirect()
                ->back()
                ->with('error', 'Lampu tidak ditemukan di database');
        }
        $lampu3->status = $request->input('status');
        $lampu3->save();

        // Kirimkan status ke API
        $status = $request->input('status') ? 'true' : 'false';
        $url = $lampu3->api_url;
        $authToken = $lampu3->api_token;

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
