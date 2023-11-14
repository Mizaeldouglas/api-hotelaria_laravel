<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);

Route::resource('clientes', ClienteController::class);
Route::resource('quartos', QuartoController::class);
Route::resource('reservas', ReservaController::class);

