<?php

namespace App\Http\Controllers;

use App\Models\Lampu; // Import the Lampu model

class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.schedule'); // Ensure the view path is correct
    }
}
