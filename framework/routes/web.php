<?php

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
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::resource('plateau', \App\Http\Controllers\v1\PlateauController::class);
            Route::resource('rover', \App\Http\Controllers\v1\RoverController::class);
            Route::resource('state', \App\Http\Controllers\v1\StateController::class);
            Route::any('rover/state/{rover_id}',  [\App\Http\Controllers\v1\StateController::class, 'state'])->name('roverstate');
        });

        Route::post('auth/login/',  [\App\Http\Controllers\v1\AuthController::class, 'login']);
        Route::any('login',  [\App\Http\Controllers\v1\AuthController::class, 'rlogin'])->name('login');
    });

    Route::prefix('v2')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::resource('plateau', \App\Http\Controllers\v2\PlateauController::class);
            Route::resource('rover', \App\Http\Controllers\v2\RoverController::class);
            Route::resource('state', \App\Http\Controllers\v2\StateController::class);
            Route::any('rover/state/{rover_id}',  [\App\Http\Controllers\v2\StateController::class, 'state'])->name('roverstate');
        });

        Route::post('auth/login/',  [\App\Http\Controllers\v2\AuthController::class, 'login']);
        Route::any('login',  [\App\Http\Controllers\v2\AuthController::class, 'rlogin'])->name('login');
    });
});

