<?php

namespace App\Http\Controllers;

use App\Models\Lampu;
use Illuminate\Http\Request;
use App\Jobs\TurnOnLamp;
use App\Jobs\TurnOffLamp;
use Carbon\Carbon;

class LampuController extends Controller
{
    public function index()
    {
        $lampus = Lampu::all(); // Ambil semua data lampu
        return view('pages.schedule', compact('lampus'));
        return view('pages.dashboard', compact('lampus'));
    }

    public function updateStatus(Request $request, $id)
    {
        $lampu = Lampu::findOrFail($id);
        $lampu->status = $request->status;
        $lampu->save();

        return redirect()->back()->with('success', 'Lampu berhasil diperbarui.');
    }

    public function updateSchedule(Request $request, Lampu $lampu)
    {
        $request->validate([
            'timeon' => 'required|date_format:H:i',
            'timeoff' => 'required|date_format:H:i',
        ]);

        $lampu->timeon = $request->timeon;
        $lampu->timeoff = $request->timeoff;
        $lampu->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully!');
    }

    public function updateName(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $lampu = Lampu::findOrFail($id);
        $lampu->name = $validatedData['name'];
        $lampu->save();

        return redirect()->route('home')->with('success', 'Name updated successfully!');
    }

    public function store(Request $request)
    {
        $lampu = Lampu::create($request->all());

        // Jadwalkan job berdasarkan waktu on/off
        $timeOn = Carbon::parse($lampu->timeon);
        $timeOff = Carbon::parse($lampu->timeoff);

        TurnOnLamp::dispatch($lampu)->delay($timeOn);
        TurnOffLamp::dispatch($lampu)->delay($timeOff);

        return response()->json(['message' => 'Lamp created and actions scheduled successfully', 'lampu' => $lampu]);
    }

    public function update(Request $request, Lampu $lampu)
    {
        $lampu->update($request->all());

        // Jadwalkan ulang job berdasarkan waktu on/off
        $timeOn = Carbon::parse($lampu->timeon);
        $timeOff = Carbon::parse($lampu->timeoff);

        TurnOnLamp::dispatch($lampu)->delay($timeOn);
        TurnOffLamp::dispatch($lampu)->delay($timeOff);

        return response()->json(['message' => 'Lamp updated and actions rescheduled successfully', 'lampu' => $lampu]);
    }
}
