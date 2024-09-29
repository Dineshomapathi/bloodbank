<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\BloodDonationController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/simulate-donation', [DashboardController::class, 'simulateDonation'])->name('simulate.donation');

    Route::resource('hospitals', HospitalController::class);
    Route::resource('donors', DonorController::class);
    Route::resource('receivers', ReceiverController::class);
    Route::resource('blood-donations', BloodDonationController::class);
    Route::resource('blood-requests', BloodRequestController::class);
});
