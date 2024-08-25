<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackOffice\CommercantController;
use App\Http\Controllers\BackOffice\CollecteController;
use App\Http\Controllers\BackOffice\BenevoleController;
use App\Http\Controllers\BackOffice\ServiceController;
use App\Http\Controllers\BackOffice\StockController;
use App\Http\Controllers\BackOffice\TourneeController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route FrontOffice
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\FrontOffice\HomeController::class, 'index'])->name('frontoffice.home');
    Route::get('/dashboard', [App\Http\Controllers\FrontOffice\DashboardController::class, 'index'])->name('dashboard');
});

// Route BackOffice
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\BackOffice\DashboardController::class, 'index'])->name('backoffice.dashboard');
    Route::resource('commercants', CommercantController::class);
    Route::resource('collectes', CollecteController::class);
    Route::resource('benevoles', BenevoleController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('tournees', TourneeController::class);
});


require __DIR__.'/auth.php';
