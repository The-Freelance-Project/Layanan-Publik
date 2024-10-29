<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('login', 'login')->name('login');
    Route::post('login/action', 'login_action')->name('login.action');
    
    Route::get('register', 'register')->name('register');
    Route::post('register/action', 'register_action')->name('register.action');

    Route::get('logout', 'logout')->name('logout');
});

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

});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'admin_dashboard')->name('admin.dashboard');
    });

});
