<?php

use App\Http\Controllers\ClientDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardViews;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\VehiculController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/signup', [UserController::class, 'signup']);
Route::post('/signup', [UserController::class, 'signup_post'])->name('signup');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'login_post'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role == 'ADMIN') {
        return redirect()->route("dashboard.stats");
    } elseif (Auth::check() && Auth::user()->role == 'CLIENT') {
        return redirect()->route("client.info");
    }
})->name("split");


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard/stats', [DashBoardViews::class, 'stats'])->name('dashboard.stats');
    Route::get('/dashboard/clients', [DashBoardViews::class, 'clients'])->name('dashboard.clients');
    Route::get('/dashboard/clients/search', [UserController::class, 'search'])->name('dashboard.clients.search');
    Route::get('/dashboard/client/{id}', [UserController::class, 'getClient'])->name('dashboard.client');
    Route::post('/dashboard/client/delete', [UserController::class, 'deleteClient'])->name('dashboard.client.delete');
    Route::put('/dashboard/client/update', [UserController::class, 'updataeClient'])->middleware(['auth', 'verified'])->name('dashboard.client.update');
    Route::get('/dashboard/clients/add', [DashBoardViews::class, 'addclient'])->name('dashboard.clients.add');
    Route::post('/dashboard/clients/add', [UserController::class, 'addNewClient']);

    Route::get('/import', [ImportController::class, 'index'])->name('import.get');
    Route::post('/import', [ImportController::class, 'import'])->name('import.post');
    Route::get('/export', [ExportController::class, 'index'])->name('export.get');
    Route::get('/export-users-pdf', [ExportController::class, 'exportUsersPdf'])->name('export.users.pdf');

    Route::get('/export-users', [ExportController::class, 'exportUsers'])->name('export.users');
    Route::get('/dashboard/vehicles', [VehiculController::class, "getAllVecles"])->name('getAllVecles');
    Route::post('/dashboard/vehicle/delete', [VehiculController::class, 'deletevehicle'])->name('dashboard.vehicle.delete');
    Route::get('/dashboard/vehicle/{id}', [VehiculController::class, 'getVehicleByID'])->name('dashboard.vehicle');


    Route::put('/dashboard/vehicle/update', [VehiculController::class, 'updataeVehicle'])->middleware(['auth', 'verified'])->name('dashboard.vehicle.update');
    Route::get('/dashboard/vehicles/add', [VehiculController::class, 'addvehicle'])->name("dashboard.vehicles.add");
    Route::post('/dashboard/vehicles/add', [VehiculController::class, 'addvehiclepost'])->name("dashboard.vehicles.add.post");

    Route::get('/import-vehicles', [ImportController::class, 'index2'])->name('import.vehicles.get');
    Route::post('/import-vehicles', [ImportController::class, 'import2'])->name('import.vehicles.post');
    Route::get('/export-vehicles', [ExportController::class, 'index2'])->name('export.vehicles.get');
    Route::get('/export-vehicles-pdf', [ExportController::class, 'exportVehiclesPdf'])->name('export.vehicles.pdf');
    Route::get('/export-vehicles-xlsx', [ExportController::class, 'exportVehicles'])->name('export.vehicles');

    Route::get('/dashboard/mechanicians', [DashBoardViews::class, "mechanicians"])->name('mechanicians');
    Route::get('/dashboard/mechanicians/add', [DashBoardViews::class, "addmechanic"])->name('dashboard.mechanicians.add');
    Route::post('/dashboard/mechanicians/add', [UserController::class, "addNewMechanic"]);
    Route::get('/import-mechanic', [ImportController::class, 'index3'])->name('import.mechanic.get');
    Route::post('/import-mechanic', [ImportController::class, 'import3'])->name('import.mechanic.post');
    Route::get('/export-mechanic', [ExportController::class, 'index3'])->name('export.mechanic.get');
    Route::get('/export-mechanics-pdf', [ExportController::class, 'exportMechanicsPdf'])->name('export.mechanics.pdf');
    Route::get('/export-mechanics', [ExportController::class, 'exportMechanics'])->name('export.mechanic');

    Route::prefix('spareparts')->group(function () {
        Route::get('/', [SparePartController::class, 'index'])->name('spareparts.index');
        Route::get('/create', [SparePartController::class, 'create'])->name('spareparts.create');
        Route::post('/', [SparePartController::class, 'store'])->name('spareparts.store');
        Route::get('/{id}', [SparePartController::class, 'show'])->name('spareparts.show');
        Route::put('/update', [SparePartController::class, 'update'])->name('spareparts.update');
        Route::delete('/delete', [SparePartController::class, 'destroy'])->name('spareparts.destroy');
    });

    Route::prefix('reparations')->group(function () {
        Route::get('/', [ReparationController::class, 'index'])->name('reparations.index');
        Route::get('/create', [ReparationController::class, 'create'])->name('reparations.create');
        Route::post('/', [ReparationController::class, 'store'])->name('reparations.store');
        Route::get('/{id}', [ReparationController::class, 'show'])->name('reparations.show');
        Route::put('/update', [ReparationController::class, 'update'])->name('reparations.update');
        Route::delete('/delete', [ReparationController::class, 'destroy'])->name('reparations.destroy');
    });

    Route::prefix('factures')->group(function () {
        Route::get('/', [FactureController::class, 'index'])->name('factures.index');
        Route::get('/create', [FactureController::class, 'create'])->name('factures.create');
        Route::post('/', [FactureController::class, 'store'])->name('factures.store');
        Route::get('/get/{id}', [FactureController::class, 'facturebyid'])->name('factures.show');

        Route::put('/', [FactureController::class, 'update'])->name('factures.update');
        Route::delete('/', [FactureController::class, 'destroy'])->name('factures.destroy');
        Route::get('/{facture}/download', [FactureController::class, 'download'])->name('factures.download');
    });
});


Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/client/dashboard', [ClientDashboardController::class, 'clientInfo'])->name('client.info');
    Route::put('/client/update/{id}', [ClientDashboardController::class, 'update'])->name('user.update');
    Route::get('/client/vehicles', [ClientDashboardController::class, 'clientVehicles'])->name('client.vehicles');
    Route::get('/client/reparations', [ClientDashboardController::class, 'reparations'])->name('client.reparations');
    Route::get('/client/invoices', [ClientDashboardController::class, 'invoices'])->name('client.invoices');
    Route::get('/{facture}/download', [FactureController::class, 'download'])->name('factures.download');
});
