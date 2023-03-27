<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/blogs', [BlogController::class, 'index']);
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

    Route::controller(TestimonialController::class)->group(function(){
        Route::post('/testimonials', 'store');
        Route::post('/testimonials/{id}', 'update');
        Route::delete('/testimonials/{id}', 'destroy');
    });
});
