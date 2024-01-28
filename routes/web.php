<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/manegement', 'manegement')->name('manegement');
    Route::get('/manegement/employees/{user}', 'show');
    Route::get('/attendance_stamp', 'attendForm')->name('attendance_stamp.attend_form');
    Route::post('/attendance_stamp', 'saveReport')->name('attendance_stamp.save_report');
    Route::get('/breaktime', 'breaktimeForm')->name('breaktime.breaktime_form');
    Route::post('/breaktime', 'start')->name('breaktime.start');
    Route::post('/breaktime/end', 'reportEnd')->name('breaktime.report_end');
    Route::get('/closing_stamp', 'closingForm')->name('closing_stamp.closing_form');
    Route::post('/closing_stamp', 'close')->name('closing_stamp.close');
});

Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

require __DIR__.'/auth.php';
