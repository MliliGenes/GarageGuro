<?php

use App\Http\Controllers\DashBoardViews;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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