<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DiskusiController;
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

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('dashboardA', [DashboardController::class, 'adminDashboard'])->name('Dashboardadmin')->middleware('redirect.admin');
    Route::get('dashboardP', [DashboardController::class, 'petaniDashboard'])->name('Dashboardpetani')->middleware('redirect.petani');

    //Rute sebelum login/sebagai tamu
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/diskusi', [DiskusiController::class, 'index']);
    Route::get('/AI', [AIController::class, 'index']);
    Route::post('/AI/predict', [AIController::class, 'predict']);

    //Rute Setelah Login
    Route::get('/artikelA', [ArtikelController::class, 'ArtikelAdmin']);
    Route::get('/artikelP', [ArtikelController::class, 'ArtikelPetani']);
    Route::get('/diskusiA', [DiskusiController::class, 'DiskusiAdmin']);
    Route::get('/diskusiP', [DiskusiController::class, 'DiskusiPetani']);
});