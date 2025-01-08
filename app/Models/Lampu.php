<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Lampu extends Model
{
    use HasFactory;

    protected $table = 'lampu';
    protected $fillable = ['name', 'timeon', 'timeoff', 'status', 'api_url', 'api_token'];

    // Fungsi untuk mengirimkan permintaan API untuk menyalakan lampu
    public function turnOn()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json;charset=UTF-8',
            'Authorization' => 'Bearer ' . $this->api_token,
            'Accept' => 'application/json, text/plain, */*',
        ])
            ->post($this->api_url, [
                'status' => true,
            ]);

        // Cek apakah API berhasil
        return $response->successful();
    }

    // Fungsi untuk mengirimkan permintaan API untuk mematikan lampu
    public function turnOff()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json;charset=UTF-8',
            'Authorization' => 'Bearer ' . $this->api_token,
            'Accept' => 'application/json, text/plain, */*',
        ])
            ->post($this->api_url, [
                'status' => false,
            ]);

        // Cek apakah API berhasil
        return $response->successful();
    }

    // Fungsi untuk memeriksa dan menjalankan tugas berdasarkan waktu
    public function scheduleLampuControl()
    {
        $currentTime = now()->format('H:i'); // Mendapatkan waktu saat ini (jam:menit)

        // Jika waktu sekarang sesuai dengan timeon, hidupkan lampu
        if ($currentTime == $this->timeon && !$this->status) {
            $this->turnOn();
            $this->status = true;
            $this->save();
        }

        // Jika waktu sekarang sesuai dengan timeoff, matikan lampu
        if ($currentTime == $this->timeoff && $this->status) {
            $this->turnOff();
            $this->status = false;
            $this->save();
        }
    }
}
