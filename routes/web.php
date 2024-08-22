<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\FrontOffice\HomeController::class, 'index'])->name('frontoffice.home');
    Route::get('/dashboard', [App\Http\Controllers\FrontOffice\DashboardController::class, 'index'])->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\BackOffice\DashboardController::class, 'index'])->name('backoffice.dashboard');

});


require __DIR__.'/auth.php';
