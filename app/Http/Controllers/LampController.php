<?php

namespace App\Http\Controllers;

use App\Models\Lamp;

class LampController extends Controller
{
    public function showSchedule()
    {
        // Mengambil semua data lampu
        $lamps = lamp::all();

        // Mengirim data lampu ke tampilan
        return view('schedule', compact('lampu'));
    }
}
