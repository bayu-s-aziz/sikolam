<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Lampu; // Pastikan model Lampu1 sudah ada dan terkoneksi dengan tabel 'lampu_1'

class Relay1Controller extends Controller
{
    public function toggleRelay1(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);

        // Update status di database
        $lampu1 = Lampu::find(1);;
        if (!$lampu1) {
            return redirect()
                ->back()
                ->with('error', 'Lampu tidak ditemukan di database');
        }
        $lampu1->status = $request->input('status');
        $lampu1->save();

        // Kirimkan status ke API
        $status = $request->input('status') ? 'true' : 'false';
        $url = $lampu1->api_url;
        $authToken = $lampu1->api_token;

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
