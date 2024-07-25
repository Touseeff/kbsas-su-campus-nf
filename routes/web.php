<?php

use GuzzleHttp\Middleware;
// use App\Models\AcademicController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAcademicController;

// Route::get('/', function () {
//     return

//     view('welcome');
// });

########################### Front End #####################################################

Route::get('/', [PageController::class, 'home'])->name('home');

########################### Admin panel ###################################################

// Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

########################### OR user middle ware ############################################


// Route::get('user/show',[DashboardController::class,'index'])->Middleware(UserMiddleware::class)->name('user.show');

########################## User ############################################################

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

############################# User Login ####################################################

Route::get('user/login', [LoginController::class, 'create'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('user/forgot',[LoginController::class,'forgot'])->name('user.forgot');
Route::post('user/mailSendingForgot',[LoginController::class,'mailSend'])->name('user.forgotMail');
Route::get('user/reset-password/{token}',[LoginController::class,'resetPasswordForm'])->name('user.resetPassword');
Route::post('user/password-update',[LoginController::class,'updatePassword'])->name('user.passwordForm');


############################## Dashboard ####################################################
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->Middleware(UserMiddleware::class)->name('dashboard');

Route::get('/user/show', [UserController::class, 'index'])->middleware(UserMiddleware::class)->name('user.show');

Route::get('/user/view/{id}', [UserController::class, 'show'])->middleware(UserMiddleware::class)->name('user.view');

Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->middleware(UserMiddleware::class)->name('user.delete');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware(UserMiddleware::class)->name
('user.edit');

Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware(UserMiddleware::class)->name('user.update');



Route::get('/academic/create', [UserAcademicController::class, 'create'])->middleware(UserMiddleware::class)->name('academic.show');
Route::post('/academic/add', [UserAcademicController::class, 'store'])->middleware(UserMiddleware::class)->name('academic.store');
Route::get('/academic/view', [UserAcademicController::class, 'index'])->middleware(UserMiddleware::class)->name('view-user-academic-record');

Route::get('/academic/edit/{id}', [UserAcademicController::class, 'edit'])->middleware(UserMiddleware::class)->name('edit-user-academic-record');

Route::post('/academic/update/{id}', [UserAcademicController::class, 'update'])->middleware(UserMiddleware::class)->name('update-user-academic-record');

##############################  ######################################################



