<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\Student\ClassController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Student\GradeController;
use App\Http\Controllers\Student\ReviewerController;
use App\Http\Controllers\Student\ScheduleController;
use App\Http\Controllers\Student\TaskController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Auth\RegistrationController;
use \App\Http\Controllers\Teacher\RenderViewsController;
use \App\Http\Controllers\UnAuthorizedController;
use \App\Http\Controllers\Teacher\ClassroomController;
use \App\Http\Controllers\Globals\ClassroomController as GlobalClassroomController;
use \App\Http\Controllers\Globals\MemberController as GlobalMemberController;
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

Route::get('/signin', [IndexController::class, 'showLoginForm']);
Route::post('/signin', [IndexController::class, 'login'])->name('login');
Route::get('/signup', [RegistrationController::class, 'showRegistrationForm']);

//Auth::routes(['verify'=>true]);

//STUDENTS GET REQUEST
//AND STILL DECIDING HOW TO KEEP THESE URLS CLEAN
//MAYBE, AS WE GO ALONG WE MAY GET AN IDEA
Route::group(['middleware' => ['auth:student'],'prefix'=>'/student'],function(){
    //HOMEPAGE OF EVERY NAVIGATION LINKS
    Route::get('/', [HomepageController::class, 'index'])->name('student.home');

    Route::get('/classroom', [ClassController::class, 'index'])->name('student.class');
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

Route::group(['middleware' => ['auth:teacher'], 'prefix'=>'/teacher'],function(){
    Route::get('/', [RenderViewsController::class, 'index'])->name('teacher.home');
    //CLASSROOM
    Route::get('/classroom', [RenderViewsController::class, 'classroom'])->name('teacher.classroom');
    Route::post('/create-classroom', [ClassroomController::class, 'createClassroom']);
});

Route::group(['middeware'=>['auth:teacher,student'], 'prefix'=>'/classroom'], function(){
    Route::get('/{uniqueUrl}', [GlobalClassroomController::class, 'renderClassroom'])->name('classroom.schedule');
});
Route::group(['middeware'=>['auth:teacher,student'], 'prefix'=>'/classroom'], function(){
    Route::get('/{uniqueUrl}/members', [GlobalMemberController::class, 'renderMembers'])->name('classroom.member');
    Route::post('/request-member/{uniqueUrl}', [GlobalMemberController::class, 'getMembersRequest']);
    Route::post('/get-approved-members/{uniqueUrl}', [GlobalMemberController::class, 'getApprovedMembers']);
    Route::post('/approve-member/{uniqueUrl}', [GlobalMemberController::class, 'approveMemberRequest']);
});


//REGISTRATION
Route::prefix('/signup')->group(function(){
    Route::get('/teacher', [RegistrationController::class, 'redirectTeacher']);
    Route::post('/teacher', [RegistrationController::class, 'registerTeacher']);

    Route::get('/student', [RegistrationController::class, 'redirectStudent']);
    Route::post('/student', [RegistrationController::class, 'registerStudent']);
});
//PARTIALS
Route::post('/checkClassCode',[RegistrationController::class, 'checkClassCode']);
Route::post('/checkEmail',[RegistrationController::class, 'checkEmail']);
//GENERAL
Route::get('/profile', [UserController::class, 'renderUserProfile'])->name('user.profile');
Route::get('/logout', [UserController::class, 'logout'])->name('user.profile');
Route::get('/unauthorized-access' ,[UnAuthorizedController::class, 'unauthorized'])->name('unauthorized.access');
