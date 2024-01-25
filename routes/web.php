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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/manegement', 'manegement')->name('manegement');
    Route::get('/manegement/employees/{user}', 'show');
    Route::get('/attendance_stamp', 'attend_form')->name('attendance_stamp.attend_form');
    Route::post('/attendance_stamp', 'save_report')->name('attendance_stamp.save_report');
    Route::get('/breaktime', 'breaktime_form')->name('breaktime.breaktime_form');
    Route::post('/breaktime', 'start')->name('breaktime.start');
    Route::post('/breaktime/end', 'report_end')->name('breaktime.report_end');
    Route::get('/closing_stamp', 'closing_form')->name('closing_stamp.closing_form');
    Route::post('/closing_stamp', 'close')->name('closing_stamp.close');
});

require __DIR__.'/auth.php';
