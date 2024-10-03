<?php

use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController as MainDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MemberProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', MainDashboard::class)->name('dashboard');

    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(AdminDashboardController::class)->group(function(){
            Route::get('dashboard', 'index')->name('admin.dashboard');
            Route::post('logout', 'logout')->name('admin.logout');
        });

        Route::controller(AdminProfileController::class)->group(function(){
            Route::get('profile', 'index')->name('admin.profile');
            Route::get('edit-profile', 'edit')->name('admin.edit-profile');
            Route::put('update-profile', 'update')->name('admin.profile.update');
            Route::post('upload-avatar', 'uploadAvatar')->name('admin.upload-avatar');
        });

    });

    Route::prefix('private')->middleware(['auth','role:member'])->group(function () {
        Route::controller(MemberDashboardController::class)->group(function(){
            Route::get('dashboard', 'index')->name('member.dashboard');
        });

        Route::controller(MemberProfileController::class)->group(function(){
            Route::get('profile', 'index')->name('member.profile');
            Route::get('edit-profile', 'edit')->name('member.edit-profile');
            Route::put('update-profile', 'update')->name('member.update-profile');
            Route::post('upload-avatar', 'uploadAvatar')->name('member.upload-avatar');
        });
    });
   

require __DIR__ . '/auth.php';
