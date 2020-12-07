<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\ClassController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Student\GradeController;
use App\Http\Controllers\Student\ReviewerController;
use App\Http\Controllers\Student\ScheduleController;
use App\Http\Controllers\Student\TaskController;
use \App\Http\Controllers\UserController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

//STUDENTS GET REQUEST
//AND STILL DECIDING HOW TO KEEP THESE URLS CLEAN
//MAYBE, AS WE GO ALONG WE MAY GET AN IDEA
Route::prefix('/student')->group(function(){
    //HOMEPAGE OF EVERY NAVIGATION LINKS
    Route::get('/', [HomepageController::class, 'index'])->name('student.home');

    Route::get('/class', [ClassController::class, 'index'])->name('student.class');
    Route::get('/{classID}/modules', [ClassController::class, 'renderClassroom'])->name('student.modules');
    Route::get('/{classID}/tasks', [ClassController::class, 'renderTask'])->name('student.tasks');
    Route::get('/{classID}/discussion', [ClassController::class, 'renderDiscussion'])->name('student.discussion');
    Route::get('/discussion/{discussionUniqueID}', [ClassController::class, 'renderDiscussionForum'])->name('student.forum');
    Route::get('/{classID}/members', [ClassController::class, 'rendermember'])->name('student.members');

    Route::get('/grades', [GradeController::class, 'index'])->name('student.grade');


    Route::get('/tasks', [TaskController::class, 'index'])->name('student.task');

    Route::get('/reviewer', [ReviewerController::class, 'index'])->name('student.reviewer');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('student.schedule');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('student.schedule');

});

Route::get('/profile', [UserController::class, 'renderUserProfile'])->name('user.profile');
