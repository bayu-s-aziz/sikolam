<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lampu;
use Carbon\Carbon;

class ControlLampu extends Command
{
    protected $signature = 'lampu:control';
    protected $description = 'Menyalakan dan Mematikan Lampu berdasarkan jadwal';

    public function handle()
    {
        // Ambil lampu yang memiliki waktu untuk menyalakan atau mematikan
        $lampus = Lampu::all();

        foreach ($lampus as $lampu) {
            $now = Carbon::now();

            // Jika waktu sekarang sama dengan timeon, nyalakan lampu
            if ($now->format('H:i') == $lampu->timeon) {
                $lampu->turnOn();
                $this->info("Lampu {$lampu->name} dinyalakan.");
            }

            // Jika waktu sekarang sama dengan timeoff, matikan lampu
            if ($now->format('H:i') == $lampu->timeoff) {
                $lampu->turnOff();
                $this->info("Lampu {$lampu->name} dimatikan.");
            }
        }
    }
}
