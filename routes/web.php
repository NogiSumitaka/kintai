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
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/attendance_stamp', [UserController::class, 'attend_form'])->name('attendance_stamp.attend_form');
    Route::post('/attendance_stamp', [UserController::class, 'save_report'])->name('attendance_stamp.save_report');
    Route::get('/breaktime',[UserController::class, 'breaktime_form'])->name('breaktime.breaktime_form');
    Route::post('/breaktime',[UserController::class, 'start'])->name('breaktime.start');
    Route::post('/breaktime/end',[UserController::class, 'report_end'])->name('breaktime.report_end');
    Route::get('/closing_stamp',[UserController::class, 'closing_form'])->name('closing_stamp.closing_form');
    Route::post('/closing_stamp',[UserController::class, 'close'])->name('closing_stamp.close');
});

require __DIR__.'/auth.php';
