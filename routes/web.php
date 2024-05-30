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
    Route::get('/daftar-petani', [AuthController::class, 'showDaftarPetani'])->name('daftar.petani');

    //Rute sebelum login/sebagai tamu
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/diskusi', [DiskusiController::class, 'index']);
    
    Route::get('/AI', [AIController::class, 'index']);
    Route::post('/AI/predict', [AIController::class, 'predict']);

    //Rute Setelah Login
    Route::resource('artikel', ArtikelController::class);
    Route::get('/artikelA', [ArtikelController::class, 'ArtikelAdmin'])->name('artikelA');
    Route::get('/artikelP', [ArtikelController::class, 'ArtikelPetani']);
    Route::post('/artikelA/upload', [ArtikelController::class, 'upload'])->name('ckeditor.upload');
    Route::get('artikel/{id}/showAdmin', [ArtikelController::class, 'showAdmin'])->name('artikel.showAdmin');
    Route::get('artikel/{id}/showPetani', [ArtikelController::class, 'showPetani'])->name('artikel.showPetani');
    Route::post('/artikel/{id}/toggle-bookmark', [ArtikelController::class, 'toggleBookmark'])->name('artikel.toggleBookmark');
    Route::get('/bookmark', [ArtikelController::class, 'bookmark'])->name('artikel.bookmark');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    
    Route::resource('diskusi', DiskusiController::class);
    Route::get('/diskusiA', [DiskusiController::class, 'DiskusiAdmin']);
    Route::get('/diskusiP', [DiskusiController::class, 'DiskusiPetani'])->name('diskusiP');
    Route::get('/diskusi/showA/{slug}', [DiskusiController::class, 'showAdmin'])->name('diskusi.showA');
    Route::get('/diskusi/showP/{slug}', [DiskusiController::class, 'showPetani'])->name('diskusi.showP');
    Route::get('/Daftar-Pertanyaan', [DiskusiController::class, 'pertanyaansaya'])->name('diskusi.pertanyaansaya');
    Route::get('/diskusi/{id}/edit', [DiskusiController::class, 'edit'])->name('diskusi.edit');
    Route::put('/diskusi/{id}', [DiskusiController::class, 'update'])->name('diskusi.update');    
    Route::resource('diskusi/{diskusi}/jawaban', JawabanController::class);
    Route::put('jawaban/{jawaban}', [JawabanController::class, 'update'])->name('jawaban.update');
});