<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', [IndexController::class, 'index']);

Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/signin', [LoginController::class, 'login']);
Route::prefix('signup')->group(function(){


    Route::get('/step-1', [RegisterController::class, 'showRegistrationForm'])->name('signup.step-1');
    Route::post('/step-1', [RegisterController::class, 'register']);

    //Change POST routes
    Route::get('/step-2', [RegisterController::class, 'showVerificationEmail'])->name('signup.step-2');
    Route::post('/step-2', [RegisterController::class, 'register']);

    //Change POST routes
    Route::get('/step-3', [RegisterController::class, 'showSubscriptionForm'])->name('signup.step-3');
    Route::post('/step-3', [RegisterController::class, 'register']);
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index'])->name('student.home');
