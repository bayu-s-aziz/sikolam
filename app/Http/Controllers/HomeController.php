<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lampu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $lampus = Lampu::all(); // Ambil semua data lampu
        return view('pages.dashboard', compact('lampus'));
    }

    public function updateStatus(Request $request, $id)
    {
        $lampu = Lampu::findOrFail($id);
        $lampu->status = $request->status;
        $lampu->save();

        return redirect()->back()->with('success', 'Lampu berhasil diperbarui.');
    }
}
