
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// User Profile
Route::middleware('auth')->group(function () {

    // Menampilkan profil
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    // Memperbarui nama dan email
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Memperbarui password
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');

});
