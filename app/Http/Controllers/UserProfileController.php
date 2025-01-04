<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        // Validasi input
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'name' => ['max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'about' => ['max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validasi avatar
        ]);

        $user = auth()->user();

        // Proses file avatar jika diunggah
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && \Storage::exists($user->avatar)) {
                \Storage::delete($user->avatar);
            }

            // Simpan file avatar baru
            $attributes['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Update user dengan data baru
        $user->update($attributes);

        return back()->with('success', 'Profile successfully updated');
    }
}
