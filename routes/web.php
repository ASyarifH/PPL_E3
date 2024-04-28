<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\JawabanController;

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
    return view('Home');
});

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password.post');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('dashboardA', [DashboardController::class, 'adminDashboard'])->name('Dashboardadmin')->middleware('redirect.admin');
    Route::get('dashboardP', [DashboardController::class, 'petaniDashboard'])->name('Dashboardpetani')->middleware('redirect.petani');
    Route::get('/profileA', [AuthController::class, 'showProfileAdmin'])->name('profile');
    Route::get('/profileP', [AuthController::class, 'showProfilePetani'])->name('profile');
    Route::post('/profileA/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profileP/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    //Rute sebelum login/sebagai tamu
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/diskusi', [DiskusiController::class, 'index']);
    
    Route::get('/AI', [AIController::class, 'index']);
    Route::post('/AI/predict', [AIController::class, 'predict']);

    //Rute Setelah Login
    Route::get('/artikelA', [ArtikelController::class, 'ArtikelAdmin']);
    Route::get('/artikelP', [ArtikelController::class, 'ArtikelPetani']);

    Route::resource('diskusi', DiskusiController::class);
    Route::resource('diskusi/{diskusi}/jawaban', JawabanController::class);
    Route::get('/diskusiA', [DiskusiController::class, 'DiskusiAdmin']);
    Route::get('/diskusiP', [DiskusiController::class, 'DiskusiPetani'])->name('diskusiP');
    Route::get('/Daftar-Pertanyaan', [DiskusiController::class, 'pertanyaansaya'])->name('diskusi.pertanyaansaya');
});