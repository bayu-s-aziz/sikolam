<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\Relay1Controller;
use App\Http\Controllers\Relay2Controller;
use App\Http\Controllers\Relay3Controller;
use App\Http\Controllers\Relay4Controller;

use App\Http\Controllers\LampuController;




Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/schedule', [LampuController::class, 'index'])->name('schedule.index');
Route::post('/lampu/{id}/update-status', [LampuController::class, 'updateStatus'])->name('lampu.update-status');
Route::post('/lampu/{lampu}/update-schedule', [LampuController::class, 'updateSchedule'])->name('lampu.update-schedule');
Route::put('/lampu/{id}/update', [LampuController::class, 'updateName'])->name('lampu.update-name');
Route::patch('/lampu/{id}/status', [LampuController::class, 'updateStatus'])->name('lampu.update-status');









Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::post('/Relay1', [Relay1Controller::class, 'toggleRelay1']);
	Route::post('/Relay2', [Relay2Controller::class, 'toggleRelay2']);
	Route::post('/Relay3', [Relay3Controller::class, 'toggleRelay3']);
	Route::post('/Relay4', [Relay4Controller::class, 'toggleRelay4']);


	Route::post('/save-schedule', function (Illuminate\Http\Request $request) {
		// Ambil data dari request
		$data = $request->only(['name', 'timeon', 'timeoff', 'status']);

		// Simpan data di session
		$schedules = Session::get('schedules', []);
		$schedules[] = $data;
		Session::put('schedules', $schedules);

		// Redirect kembali ke halaman sebelumnya dengan pesan sukses
		return redirect()->back()->with('success', 'Schedule updated successfully!');
	})->name('save.schedule');
});
