<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OperatingSystemController;
use App\Http\Controllers\SeverityController;
use App\Http\Controllers\VulnerabilityTicketController;
use App\Http\Controllers\ExecuteController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ConfigurationsController;
use App\Http\Controllers\PluginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware(['auth']);


Route::get('/dashboard', [
    VulnerabilityTicketController::class, 'list'
])->middleware(['auth'])->name('dashboard');

Route::get('/users', [
    UserController::class, 'index'
])->middleware(['auth'])->name('users');

Route::get('/users/new', [
    UserController::class, 'new'
])->middleware(['auth'])->name('users-new');

Route::get('/users/{id}', [
    UserController::class, 'edit'
])->middleware(['auth'])->name('user-edit');

Route::post('/users/store', [
    UserController::class, 'store'
])->middleware(['auth'])->name('users-store');

Route::post('/users/update', [
    UserController::class, 'update'
])->middleware(['auth'])->name('users-update');

Route::post('/users/disabled', [
    UserController::class, 'disabled'
])->middleware(['auth'])->name('users-disabled');

Route::get('/import/{type}', [
    VulnerabilityTicketController::class, 'import'
])->middleware(['auth'])->name('new-import');

Route::post('/import', [
    VulnerabilityTicketController::class, 'store'
])->middleware(['auth'])->name('store-import');

Route::get('/configurations', [
    ConfigurationsController::class, 'index'
])->middleware(['auth'])->name('config-index');

//Roles
Route::get('/roles', [
    RoleController::class, 'index'
])->middleware(['auth'])->name('roles');

Route::get('/roles/new', [
    RoleController::class, 'new'
])->middleware(['auth'])->name('roles-new');

Route::post('/roles/store', [
    RoleController::class, 'store'
])->middleware(['auth'])->name('roles-store');

Route::get('/roles/{id}', [
    RoleController::class, 'edit'
])->middleware(['auth'])->name('roles-edit');

Route::post('/roles/update', [
    RoleController::class, 'update'
])->middleware(['auth'])->name('roles-update');

Route::post('/roles/disabled', [
    RoleController::class, 'disabled'
])->middleware(['auth'])->name('roles-disabled');


//os
Route::get('/os', [
    OperatingSystemController::class, 'index'
])->middleware(['auth'])->name('os');

Route::get('/os/new', [
    OperatingSystemController::class, 'new'
])->middleware(['auth'])->name('os-new');

Route::post('/os/store', [
    OperatingSystemController::class, 'store'
])->middleware(['auth'])->name('os-store');

Route::get('/os/{id}', [
    OperatingSystemController::class, 'edit'
])->middleware(['auth'])->name('os-edit');

Route::post('/os/update', [
    OperatingSystemController::class, 'update'
])->middleware(['auth'])->name('os-update');

Route::post('/os/disabled', [
    OperatingSystemController::class, 'disabled'
])->middleware(['auth'])->name('os-disabled');


//severity
Route::get('/severity', [
    SeverityController::class, 'index'
])->middleware(['auth'])->name('severity');

Route::get('/severity/new', [
    SeverityController::class, 'new'
])->middleware(['auth'])->name('severity-new');

Route::post('/severity/store', [
    SeverityController::class, 'store'
])->middleware(['auth'])->name('severity-store');

Route::get('/severity/{id}', [
    SeverityController::class, 'edit'
])->middleware(['auth'])->name('severity-edit');

Route::post('/severity/update', [
    SeverityController::class, 'update'
])->middleware(['auth'])->name('severity-update');

Route::post('/severity/disabled', [
    SeverityController::class, 'disabled'
])->middleware(['auth'])->name('severity-disabled');

//execute
Route::get('/execute', [
    ExecuteController::class, 'index'
])->middleware(['auth'])->name('execute');

Route::get('/execute/new', [
    ExecuteController::class, 'new'
])->middleware(['auth'])->name('execute-new');

Route::post('/execute/store', [
    ExecuteController::class, 'store'
])->middleware(['auth'])->name('execute-store');

Route::get('/execute/{id}', [
    ExecuteController::class, 'edit'
])->middleware(['auth'])->name('execute-edit');

Route::post('/execute/update', [
    ExecuteController::class, 'update'
])->middleware(['auth'])->name('execute-update');

Route::post('/execute/disabled', [
    ExecuteController::class, 'disabled'
])->middleware(['auth'])->name('execute-disabled');

//states
Route::get('/states', [
    StateController::class, 'index'
])->middleware(['auth'])->name('states');

Route::get('/states/new', [
    StateController::class, 'new'
])->middleware(['auth'])->name('states-new');

Route::post('/states/store', [
    StateController::class, 'store'
])->middleware(['auth'])->name('states-store');

Route::get('/states/{id}', [
    StateController::class, 'edit'
])->middleware(['auth'])->name('states-edit');

Route::post('/states/update', [
    StateController::class, 'update'
])->middleware(['auth'])->name('states-update');

Route::post('/states/disabled', [
    StateController::class, 'disabled'
])->middleware(['auth'])->name('states-disabled');

Route::get('/ticket/{id}', [
    VulnerabilityTicketController::class, 'viewLog'
])->middleware(['auth'])->name('view-log');

Route::get('/ticket/{id}/assign', [
    VulnerabilityTicketController::class, 'assign'
])->middleware(['auth'])->name('view-assign');

Route::post('/ticket/assign', [
    VulnerabilityTicketController::class, 'assignTicket'
])->middleware(['auth'])->name('ticket-user');

Route::post('/ticket/start', [
    VulnerabilityTicketController::class, 'startTicket'
])->middleware(['auth'])->name('ticket-start');


Route::post('/ticket', [
    VulnerabilityTicketController::class, 'addTicketSolution'
])->middleware(['auth'])->name('ticket-solution');

Route::post('/ticket/store-work', [
    VulnerabilityTicketController::class, 'storeTicketSolution'
])->middleware(['auth'])->name('store-work');


Route::get('/learn', [
    PluginController::class, 'list'
])->middleware(['auth'])->name('learn-list');
require __DIR__.'/auth.php';
