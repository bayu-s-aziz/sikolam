<?php

namespace App\Jobs;

use App\Models\Lampu;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class TurnOffLamp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lampu;

    public function __construct(Lampu $lampu)
    {
        $this->lampu = $lampu;
    }

    public function handle()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->lampu->api_token,
            'Content-Type' => 'application/json;charset=UTF-8',
        ])->post($this->lampu->api_url, ['status' => false]);

        // Anda bisa menambahkan logika untuk memeriksa apakah API berhasil
        if ($response->successful()) {
            // Berhasil mematikan lampu
        }
    }
}
