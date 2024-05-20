<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardViews;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\VehiculController;

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

Route::get('/', function () {
    return redirect()->route("dashboard.stats");
})->middleware(['auth'])->name('dashboard');


Route::get('account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');

Route::get('/dashboard/stats', [DashBoardViews::class, 'stats'])->name('dashboard.stats');

Route::get('/dashboard/clients', [DashBoardViews::class, 'clients'])->name('dashboard.clients');

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