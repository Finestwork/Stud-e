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
use \App\Http\Controllers\UploadController;
use \App\Http\Controllers\Teacher\CreateModuleController;
use App\Http\Controllers\Globals\TaskController as GlobalTaskController;
use \App\Http\Controllers\Teacher\TaskController as TeacherTaskController;
use \App\Http\Controllers\PasswordResetController;
use \App\Http\Controllers\DownloadController;
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
Route::group(['middleware' => ['auth:student'],'prefix'=>'/student'],function(){
    //HOMEPAGE OF EVERY NAVIGATION LINKS
    Route::get('/', [HomepageController::class, 'index'])->name('student.home');

    Route::get('/modules', [ClassController::class, 'renderModules'])->name('student.modules');
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
//SEPARATE ACTIONS INCLUDE STUDENT IN AUTHENTICATION WITH
Route::group(['middleware' => ['auth:teacher'], 'prefix'=>'/teacher'],function(){
    // ARRANGE separate teacher.home
    Route::get('/', [RenderViewsController::class, 'index'])->name('teacher.home');
    //CLASSROOM
    Route::post('/update-classroom', [ClassroomController::class, 'updateClassroom']);
    Route::post('/check-classroomCode', [ClassroomController::class, 'checkClassroomCode']);
    //TASK
    Route::get('/create-task/{uniqueUrl}', [TeacherTaskController::class, 'createTask'])->name('create.task');
});

Route::group(['middeware'=>['auth:teacher'], 'prefix'=>'/classroom'], function(){
    Route::get('/create', [GlobalClassroomController::class, 'renderClasslist'])->name('classroom.create');
});
Route::group(['middeware'=>['auth:teacher, student'], 'prefix'=>'/classroom'], function(){
    Route::get('/', [GlobalClassroomController::class, 'renderClasslist'])->name('classroom.index');
    Route::get('/create', [GlobalClassroomController::class, 'renderClasslist'])->name('classroom.create');
    Route::get('/{uniqueUrl}', [GlobalClassroomController::class, 'renderClassroom'])->name('classroom.schedule');
});
Route::group(['middeware'=>['auth:teacher, student'], 'prefix'=>'/modules'], function(){
    Route::get('/{uniqueUrl}', [GlobalClassroomController::class, 'renderModules'])->name('classroom.modules');
});
Route::group(['middeware'=>['auth:teacher, student'], 'prefix'=>'/task'], function(){
    Route::get('/{uniqueUrl}', [GlobalTaskController::class, 'renderTasks'])->name('classroom.task');
});

Route::group(['middeware'=>['auth:teacher'], 'prefix'=>'/classroom'], function(){
    Route::post('/create', [ClassroomController::class, 'createClassroom'])->name('classroom.create');

    //RETRIEVE
    Route::get('/{uniqueUrl}/members', [GlobalMemberController::class, 'renderMembers'])->name('classroom.member');
    Route::post('/request-member/{uniqueUrl}', [GlobalMemberController::class, 'getMembersRequest']);
    Route::post('/get-approved-members/{uniqueUrl}', [GlobalMemberController::class, 'getApprovedMembers']);
    Route::post('/get-blocked-members/{uniqueUrl}', [GlobalMemberController::class, 'getBlockedMembers']);
    //ACTIONS
    Route::post('/approve-member/{uniqueUrl}', [GlobalMemberController::class, 'approveMemberRequest']);
    Route::post('/block-member/{uniqueUrl}', [GlobalMemberController::class, 'blockMember']);
    Route::post('/cancel-member/{uniqueUrl}', [GlobalMemberController::class, 'cancelRequest']);
    Route::post('/remove-member/{uniqueUrl}', [GlobalMemberController::class, 'removeMember']);
    Route::post('/unblock-student/{uniqueUrl}', [GlobalMemberController::class, 'unblockMember']);
    //CREATING A MODULE
    Route::post('/create-title', [CreateModuleController::class, 'createPrimaryTitle']);
    Route::post('/delete-title', [CreateModuleController::class, 'deletePrimaryTitle']);
    Route::post('/create-module', [CreateModuleController::class, 'createModule']);
    Route::post('/update-module', [CreateModuleController::class, 'updateModule']);
    Route::post('/delete-module', [CreateModuleController::class, 'deleteModule']);
    //UPLOADING FILES
    Route::post('/upload-modules', [UploadController::class, 'validateUploadedFiles']);
    Route::post('/delete-file', [UploadController::class, 'deleteUpload']);
});

Route::prefix('/download')->group(function (){
    Route::get('{classUrl}/{fileType}/{fileID}', [DownloadController::class, 'downloadAFile'])->name('download.file');
});
//REGISTRATION
Route::prefix('/signup')->group(function(){
    Route::get('/teacher', [RegistrationController::class, 'redirectTeacher']);
    Route::post('/teacher', [RegistrationController::class, 'registerTeacher']);

    Route::get('/student', [RegistrationController::class, 'redirectStudent']);
    Route::post('/student', [RegistrationController::class, 'registerStudent']);

    Route::get('/verified/{uniqueUrl}', [RegistrationController::class, 'verifiedUser'])->name('getUserVerified');
});
//PARTIALS
Route::post('/checkClassCode',[RegistrationController::class, 'checkClassCode']);
Route::post('/checkEmail',[RegistrationController::class, 'checkEmail']);
Route::get('/verify-email',[IndexController::class, 'resendEmail'])->name('resend.verification.link');
Route::post('/resend-lost-link',[IndexController::class, 'checkIfEEmailTokenIsValid'])->name('resend.verification.link');
Route::post('/enroll',[GlobalClassroomController::class, 'checkCode']);
Route::post('/resend-verification', [RegistrationController::class, 'resendLink']);
Route::post('/reset-password', [PasswordResetController::class, 'validateUserBeforePasswordReset']);
Route::get('/verify-password-reset/{uniqueUrl}', [PasswordResetController::class, 'displayViewBeforePasswordReset'])->name('verify.password.reset');
Route::post('/verify-password-reset', [PasswordResetController::class, 'verifyPasswordLink']);
//GENERAL
Route::get('/profile', [UserController::class, 'renderUserProfile'])->name('user.profile');
Route::get('/logout', [UserController::class, 'logout'])->name('user.profile');
Route::get('/unauthorized-access' ,[UnAuthorizedController::class, 'unauthorized'])->name('unauthorized.access');
