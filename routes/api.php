<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookingController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware(['auth:sanctum', 'role:customer'])->group(function () {
    Route::controller(BookingController::class)->group(function () {
        Route::get('/locations', 'getBranchList');
        Route::get('/treatments', 'getTreatmentList');
        Route::post('/appointments/check-slots', 'checkAvailableSlots');
        Route::get('/therapists', 'getTherapistsByTreatment');
        Route::post('/appointments', 'createBooking');
        Route::get('/appointments/{id}', 'detailBooking');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout');
    });
});
