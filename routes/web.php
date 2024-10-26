<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('login', 'login')->name('login');
    Route::post('login/action', 'login_action')->name('login.action');
    
    Route::get('register', 'register')->name('register');
    Route::post('register/action', 'register_action')->name('register.action');
});

Route::middleware(['auth', 'user'])->prefix('user')->group(function (){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'user_dashboard')->name('user.dashboard');
    });

});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'admin_dashboard')->name('admin.dashboard');
    });

});
