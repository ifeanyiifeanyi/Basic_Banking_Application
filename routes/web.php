<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController as MainDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', MainDashboard::class)->name('dashboard');

    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(AdminDashboardController::class)->group(function(){
            Route::get('dashboard', 'index')->name('admin.dashboard');
        });

    });

    Route::prefix('private')->middleware(['auth','role:member'])->group(function () {
        Route::controller(MemberDashboardController::class)->group(function(){
            Route::get('dashboard', 'index')->name('member.dashboard');
        });
    });
   

require __DIR__ . '/auth.php';
