<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackOffice\CommercantController;
use App\Http\Controllers\BackOffice\CollecteController;
use App\Http\Controllers\BackOffice\BenevoleController;
use App\Http\Controllers\BackOffice\ServiceController;
use App\Http\Controllers\BackOffice\StockController;
use App\Http\Controllers\BackOffice\TourneeController;
use App\Http\Controllers\BackOffice\UsersController;
use App\Http\Controllers\BackOffice\VehiculeController;
use App\Http\Controllers\BackOffice\ProduitController;
use App\Http\Controllers\Backoffice\SkillBenevoleController;
use App\Http\Controllers\BackOffice\ServiceProposalController;
use App\Http\Controllers\BackOffice\ServicePlanningController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CollectesExport;
use App\Exports\TourneesExport;
use App\Exports\ServicesExport;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route FrontOffice
Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\FrontOffice\HomeController::class, 'index'])->name('frontoffice.home');
    Route::get('/dashboard', [App\Http\Controllers\FrontOffice\DashboardController::class, 'index'])->name('frontoffice.dashboard');

    // Services
    Route::resource('/services', 'App\Http\Controllers\FrontOffice\ServiceController')->names([
        'index' => 'servicesfront.index',
        'show' => 'servicesfront.show',
    ]);
    Route::post('/services/{id}/inscription', [App\Http\Controllers\FrontOffice\ServiceController::class, 'inscription'])->name('servicesfront.inscription');

    // Collectes
    Route::resource('/collectes', 'App\Http\Controllers\FrontOffice\CollecteController')->names([
        'index' => 'collectesfront.index',
        'show' => 'collectesfront.show',
    ]);
    Route::post('/collectes/{id}/inscription', [App\Http\Controllers\FrontOffice\CollecteController::class, 'inscription'])->name('collectesfront.inscription');

    // Tournees
    Route::resource('/tournees', 'App\Http\Controllers\FrontOffice\TourneeController')->names([
        'index' => 'tourneesfront.index',
        'show' => 'tourneesfront.show',
    ]);
    Route::post('/tournees/{id}/inscription', [App\Http\Controllers\FrontOffice\TourneeController::class, 'inscription'])->name('tourneesfront.inscription');

});


// Routes pour les Commerçants
Route::middleware(['auth', 'role:commercant'])->group(function () {
    Route::get('/commercant', [App\Http\Controllers\CommercantOffice\CommercantController::class, 'dashboard'])->name('commercant.dashboard');

    Route::get('/commercant/collectes', [App\Http\Controllers\CommercantOffice\CommercantController::class, 'collectes'])->name('commercant.collectes');
    Route::get('/commercant/profile', [App\Http\Controllers\CommercantOffice\CommercantController::class, 'profile'])->name('commercant.profile');

});

Route::get('/devenir-partenaire', [App\Http\Controllers\CommercantOffice\CommercantController::class, 'registrationForm'])->name('commercantfront.inscription-commercant');
Route::post('/inscription-commercant', [App\Http\Controllers\CommercantOffice\CommercantController::class, 'register'])->name('commercantfront.register');


// Route BackOffice
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\BackOffice\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('commercants', CommercantController::class);
    Route::resource('collectes', CollecteController::class);
    Route::resource('benevoles', BenevoleController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('tournees', TourneeController::class);
    Route::resource('vehicules', VehiculeController::class);
    Route::resource('produits', ProduitController::class);
    Route::resource('skills_benevole', SkillBenevoleController::class);
    Route::resource('service_plannings', ServicePlanningController::class);
    Route::resource('service_proposals', ServiceProposalController::class)->only(['index', 'show', 'store']);
    Route::post('service_proposals/{id}/approve', [ServiceProposalController::class, 'approve'])->name('service_proposals.approve');
    Route::post('service_proposals/{id}/reject', [ServiceProposalController::class, 'reject'])->name('service_proposals.reject');
});

// Route Export

// Collectes
Route::get('/export/collectes', function () {
    return Excel::download(new CollectesExport, 'collectes.xlsx');
})->name('export.collectes');

// Route pour exporter les tournées
Route::get('/export/tournees', function () {
    return Excel::download(new TourneesExport, 'tournees.xlsx');
})->name('export.tournees');

// Route pour exporter les services
Route::get('/export/services', function () {
    return Excel::download(new ServicesExport, 'services.xlsx');
})->name('export.services');

require __DIR__.'/auth.php';
