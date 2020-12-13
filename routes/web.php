<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\ClassController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Student\GradeController;
use App\Http\Controllers\Student\ReviewerController;
use App\Http\Controllers\Student\ScheduleController;
use App\Http\Controllers\Student\TaskController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Auth\RegistrationController;
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
    Route::get('/step-1', [RegistrationController::class, 'showRegistrationForm'])->name('signup.step-1');
    //Change POST routes
    Route::get('/step-2', [RegistrationController::class, 'showVerificationEmail'])->name('signup.step-2');

    //Change POST
    Route::get('/step-3', [RegistrationController::class, 'showSubscriptionForm'])->name('signup.step-3');
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
    Route::get('/modules', [ClassController::class, 'renderClassroom'])->name('student.modules');
    Route::get('/tasks', [ClassController::class, 'renderTask'])->name('student.tasks');
    Route::get('/members', [ClassController::class, 'rendermember'])->name('student.members');

    Route::get('/view-discussion/{discussionUniqueID}', [ClassController::class, 'renderDiscussionForum'])->name('student.forum');
    Route::get('/discussion-board', [ClassController::class, 'renderDiscussion'])->name('student.discussion');
    Route::get('/discussion/create', [ClassController::class, 'renderCreateDiscussionForum'])->name('discussion.create');

    Route::get('/grades', [GradeController::class, 'index'])->name('student.grade');


    Route::get('/view-task', [TaskController::class, 'index'])->name('student.task');
    Route::get('/view-task/{taskID}', [TaskController::class, 'renderTaskInfoPage'])->name('student.task.page');
    Route::get('/{taskID}', [TaskController::class, 'renderTakingATaskPage'])->name('student.task.take');
    Route::get('/task/{taskID}', [TaskController::class, 'renderCommonTask'])->name('student.tasking.common');
    Route::get('/task-essay/{taskID}', [TaskController::class, 'renderEssayTask'])->name('student.tasking.essay');

    Route::get('/reviewer', [ReviewerController::class, 'index'])->name('student.reviewer');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('student.schedule');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('student.schedule');

});
//REGISTRATION
Route::prefix('/teacher')->group(function(){
    Route::get('/signup', [RegistrationController::class, 'redirectTeacher']);
    Route::post('/signup', [RegistrationController::class, 'registerTeacher']);
});
Route::prefix('/student')->group(function(){
    Route::get('/signup', [RegistrationController::class, 'redirectStudent']);
    Route::post('/signup', [RegistrationController::class, 'registerStudent']);
});
//PARTIALS
Route::post('/checkClassCode',[RegistrationController::class, 'checkClassCode']);
Route::post('/checkEmail',[RegistrationController::class, 'checkEmail']);
//GENERAL
Route::get('/profile', [UserController::class, 'renderUserProfile'])->name('user.profile');
