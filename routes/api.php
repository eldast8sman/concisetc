<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WorkController;

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

Route::get('/testimonials', [TestimonialController::class, 'index']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
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

    Route::controller(WorkController::class)->group(function(){
        Route::post('/works', 'store');
        Route::post('/works/{id}', 'update');
        Route::post('/works/images/add', 'add_file');
        Route::post('/works/images/change/{id}', 'change_file');
        Route::delete('/works/images/{id}', 'destroy_file');
        Route::delete('/works/{id}', 'destroy');
    });

    Route::controller(ServiceController::class)->group(function(){
        Route::post('/services', 'store');
        Route::post('/services/{id}', 'update');
        Route::delete('/services/{id}', 'destroy');
    });
});

Route::post('/send_message', [AuthController::class, 'send_message']);
