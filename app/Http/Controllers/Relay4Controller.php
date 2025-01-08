<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Lampu; // Pastikan model Lampu4 sudah ada dan terkoneksi dengan tabel 'lampu_4'

class Relay4Controller extends Controller
{
    public function toggleRelay4(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);

        // Update status di database
        $lampu4 = Lampu::find(4);;
        if (!$lampu4) {
            return redirect()
                ->back()
                ->with('error', 'Lampu tidak ditemukan di database');
        }
        $lampu4->status = $request->input('status');
        $lampu4->save();

        // Kirimkan status ke API
        $status = $request->input('status') ? 'true' : 'false';
        $url = $lampu4->api_url;
        $authToken = $lampu4->api_token;

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
