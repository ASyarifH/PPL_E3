<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AIController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
// Rute untuk menampilkan form prediksi
Route::get('/AI', [AIController::class, 'index']);
// Rute untuk melakukan prediksi berdasarkan input dari form
Route::post('/AI/predict', [AIController::class, 'predict']);

// Apply CheckLogin middleware to routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/Dashboard', function () {
        return view('Dashboard');
    });

    // Routes Check login bila masih tamu dipaksa ke halaman login
    Route::middleware(['checklogin'])->group(function () {
        Route::get('/Diskusi', function () {
            return view('Diskusi');
        });

        // Route::get('/AI', function () {
        //     return view('AI');
        // });

        Route::get('/Artikel', function () {
            return view('Artikel');
        });
    });
});
