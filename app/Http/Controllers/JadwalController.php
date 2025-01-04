<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all(); // Ambil semua data dari tabel jadwal
        return view('pages.jadwal', compact('jadwals')); // Kirim data ke view
    }
}
