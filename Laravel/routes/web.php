<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;

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

Route::get('/', [DashboardController::class,"Dashboard"]);
Route::get('/register', [AuthController::class,"register"]);
Route::post('/home', [AuthController::class,"home"]);

Route::get('/data-table', function() {
    return view('page.data-table');
});

Route::get('/table', function() {
    return view('page.table');
});

// CRUD Cast
// C => Create Data
Route::get('/cast/create', [CastController::class,"create"]);
Route::post('/cast', [CastController::class,"store"]);

// R => Read Data
Route::get('/cast', [CastController::class,"index"]);
Route::get('/cast/{cast_id}', [CastController::class,"show"]);

// U => Update Data
Route::get('/cast/{cast_id}/edit', [CastController::class,"edit"]);
Route::put('/cast/{cast_id}', [CastController::class,"update"]);

// D => Delete Data
Route::delete('/cast/{cast_id}', [CastController::class,"destroy"]);