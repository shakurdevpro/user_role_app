<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;


Route::get('/', function () {
    return view('welcome');
});

// Sign-Up
Route::get('/register', [SignUpController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SignUpController::class, 'register']);


// Sign-In
Route::get('login', [SignInController::class, 'showLoginForm'])->name('login');
Route::post('login', [SignInController::class, 'login']);

//Dashboards
Route::get('/dashboard/default', [SignInController::class, 'defaultDashboard'])->name('default.dashboard');
Route::get('/dashboard/guest', [SignInController::class, 'guestDashboard'])->name('guest.dashboard');
Route::get('/dashboard/inactive', [SignInController::class, 'inactiveDashboard'])->name('inactive.dashboard');

//Déconnexion
Route::post('/logout', [SignInController::class, 'logout'])->name('logout');

