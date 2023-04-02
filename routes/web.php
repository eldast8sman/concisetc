<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
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

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/about-us', 'about');

    Route::get('/blogs', 'blogs');
    Route::get('/blogs/{slug}', 'blog');

    Route::get('/our-work', 'projects');
    Route::get('/our-work/{slug}', 'project');

    Route::get('/contact-us', 'contact');
});

Route::prefix('dashboard')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/', 'index');
        
        Route::get('/login', 'login');

        Route::get('/blogs', 'blogs');
        Route::get('/blogs/{slug}', 'blog');

        Route::get('/projects', 'projects');
        Route::get('/projects/{slug}', 'project');
    });
});
