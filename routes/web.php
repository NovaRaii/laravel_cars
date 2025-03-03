<?php

use App\Http\Controllers\BodyController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

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
    return view('layout');
});
//Route::resource('makers', MakerController::class);

Route::get('/makers', [MakerController::class, 'index'])->name('makers.index');
Route::get('/makers/create', [MakerController::class, 'create'])->name('makers.create');
Route::get('/makers/{body}/edit', [MakerController::class, 'edit'])->name('makers.edit');
Route::patch('/makers/{body}', [MakerController::class, 'update'])->name('makers.update');
Route::delete('/makers/{body}', [MakerController::class, 'destroy'])->name('makers.destroy');
Route::get('/makers/{body}', [MakerController::class, 'show'])->name('makers.show');
Route::post('/makers', [MakerController::class, 'store'])->name('makers.store');
Route::get('/makers/{maker}/fetch-models', [MakerController::class, 'fetchModels'])->name('makers.fetch.models');


Route::get('/bodies',[BodyController::class, 'index'])->name('bodies.index');
Route::get('/bodies/create', [BodyController::class, 'create'])->name('bodies.create');
Route::get('/bodies/{body}/edit', [BodyController::class, 'edit'])->name('bodies.edit');
Route::patch('/bodies/{body}', [BodyController::class, 'update'])->name(    'bodies.update');
Route::delete('/bodies/{body}', [BodyController::class, 'destroy'])->name('bodies.destroy');
Route::get('/bodies/{body}', [BodyController::class, 'show'])->name('bodies.show');
Route::post('/bodies', [BodyController::class, 'store'])->name('bodies.store');

Route::get('/fuels',[FuelController::class, 'index'])->name('fuels.index');
Route::get('/fuels/create', [FuelController::class, 'create'])->name('fuels.create');
Route::get('/fuels/{body}/edit', [FuelController::class, 'edit'])->name('fuels.edit');
Route::patch('/fuels/{body}', [FuelController::class, 'update'])->name('fuels.update');
Route::delete('/fuels/{body}', [FuelController::class, 'destroy'])->name('fuels.destroy');
Route::get('/fuels/{body}', [FuelController::class, 'show'])->name('fuels.show');
Route::post('/fuels', [FuelController::class, 'store'])->name('fuels.store');

Route::get('/models',[ModelController::class, 'index'])->name('models.index');
Route::get('/models/create', [ModelController::class, 'create'])->name('models.create');
Route::get('/models/{body}/edit', [ModelController::class, 'edit'])->name('models.edit');
Route::patch('/models/{body}', [ModelController::class, 'update'])->name('models.update');
Route::delete('/models/{body}', [ModelController::class, 'destroy'])->name('models.destroy');
Route::get('/models/{body}', [ModelController::class, 'show'])->name('models.show');
Route::post('/models', [ModelController::class, 'store'])->name('models.store');

Route::get('/vehicles',[VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::get('/vehicles/{body}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::patch('/vehicles/{body}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{body}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::get('/vehicles/{body}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');