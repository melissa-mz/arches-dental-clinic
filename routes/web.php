<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil (votre page de présentation)
Route::get('/', function () {
    return view('welcome');
});

// Système de rendez-vous (calendrier moderne)
Route::get('/rdv', [CalendarController::class, 'index'])->name('rdv.create');
Route::post('/rdv', [CalendarController::class, 'store'])->name('rdv.store');
Route::get('/rdv/availability', [CalendarController::class, 'availability'])->name('calendar.availability');
Route::get('/rdv/slots', [CalendarController::class, 'slots'])->name('calendar.slots');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::middleware(['web'])->group(function () {
    Route::get('/admin/appointments', [AdminController::class, 'index'])->name('admin.appointments');
    Route::post('/admin/appointments/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});