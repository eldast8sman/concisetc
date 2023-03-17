<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;

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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(BlogController::class)->group(function(){
        Route::post('/blogs', 'store');
        Route::post('/blogs/{id}', 'update');
        Route::delete('/blogs/{id}', 'destroy');
    });

    Route::controller(TeamController::class)->group(function(){
        Route::post('/teams', 'store');
        Route::post('/teams/{id}', 'update');
        Route::delete('/teams/{id}', 'destroy');
    });
});
