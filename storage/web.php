<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CropFarmerController;
use App\Http\Controllers\ReportController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/Home', function () {
        return view('Home');
    });

    // Route::get('/crops', [CropsController::class, 'index'])->name('crops.index');
    // Route::get('/crops/create', [CropsController::class, 'create'])->name('crops.create');
    // Route::post('/crops', [CropsController::class, 'store'])->name('crops.store');
    // Route::get('/crops/{id}', [CropsController::class, 'show'])->name('crops.show');
    // Route::get('/crops/{id}/edit', [CropsController::class, 'edit'])->name('crops.edit');
    // Route::put('/crops/{id}', [CropsController::class, 'update'])->name('crops.update');
    // Route::delete('/crops/{id}', [CropsController::class, 'destroy'])->name('crops.destroy');

    // Route::get('/farmers', [FarmerController::class, 'index'])->name('farmers.index');
    // Route::get('/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
    // Route::post('/farmers', [FarmerController::class, 'store'])->name('farmers.store');
    // Route::get('/farmers/{id}', [FarmerController::class, 'show'])->name('farmers.show');
    // Route::get('/farmers/{id}/edit', [FarmerController::class, 'edit'])->name('farmers.edit');
    // Route::put('/farmers/{id}', [FarmerController::class, 'update'])->name('farmers.update');
    // Route::delete('/farmers/{id}', [FarmerController::class, 'destroy'])->name('farmers.destroy');

    // Route::get('/cropfarmers', [CropFarmerController::class, 'index'])->name('cropfarmers.index');
    // Route::get('/cropfarmers/create', [CropFarmerController::class, 'create'])->name('cropfarmers.create');
    // Route::post('/cropfarmers', [CropFarmerController::class, 'store'])->name('cropfarmers.store');
    // Route::get('/cropfarmers/{cropfarmer}', [CropFarmerController::class, 'show'])->name('cropfarmers.show');
    // Route::get('/cropfarmers/{cropfarmer}/edit', [CropFarmerController::class, 'edit'])->name('cropfarmers.edit');
    // Route::put('/cropfarmers/{cropfarmer}', [CropFarmerController::class, 'update'])->name('cropfarmers.update');
    // Route::delete('/cropfarmers/{cropfarmer}', [CropFarmerController::class, 'destroy'])->name('cropfarmers.destroy');

    // Route::get('/reports/crop-farmer', [ReportController::class, 'cropFarmerReport'])->name('reports.crop_farmer');
});