<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaintStatusHistoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route Landig=ng Page
Route::get('/', function () {
    return view('landingPage');
});

// Route Authentikasi
Route::controller(AuthController::class)->group(function (){
    Route::get('login', 'login')->name('login');
    Route::post('login/action', 'login_action')->name('login.action');
    
    Route::get('register', 'register')->name('register');
    Route::post('register/action', 'register_action')->name('register.action');

    Route::get('logout', 'logout')->name('logout');
});

// Route Untuk Pengguna dengan Role 'user'
Route::middleware(['auth', 'user'])->prefix('user')->group(function (){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'user_dashboard')->name('user.dashboard');
    });

    Route::controller(ComplaintController::class)->prefix('complaints')->group(function(){
        Route::get('list', 'complaint_list')->name('complaint');
        Route::get('view/{id}', 'complaint_view')->name('complaint.view');
        Route::get('form', 'complaint_form')->name('complaint.form');
        Route::post('add', 'complaint_add')->name('complaint.add');
    });

    Route::controller(ResponseController::class)->prefix('responses')->group(function(){
        Route::post('add', 'response_add')->name('response.add');
    });

    Route::controller(CompaintStatusHistoryController::class)->prefix('history')->group(function(){
        Route::get('list', 'history_list')->name('history.list');
    });

});


// Route Untuk Pengguna dengan Role 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'admin_dashboard')->name('admin.dashboard');
    });

    Route::controller(ComplaintController::class)->prefix('complaints')->group(function(){
        Route::get('list', 'complaint_list_admin')->name('complaint.admin');
        Route::get('view/{id}', 'complaint_view')->name('complaint.view.admin');
    });

    Route::controller(ResponseController::class)->prefix('responses')->group(function(){
        Route::post('add', 'response_add')->name('response.add.admin');
    });

    Route::controller(CompaintStatusHistoryController::class)->prefix('history')->group(function(){
        Route::post('process/{id}', 'process')->name('complaint.process');
    });

});

// Route untuk admin dan User
Route::middleware('auth')->controller(UserController::class)->prefix('u')->group(function(){
    Route::get('profile', 'profile')->name('profile');

    Route::post('profile-change-name', 'profile_change_name')->name('profile.change.name');
    Route::post('profile-change-password', 'profile_change_password')->name('profile.change.password');
});
