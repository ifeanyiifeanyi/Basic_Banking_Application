<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AdminCurrencyController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\Admin\AdminTwoFactorAuthController;
use App\Http\Controllers\DashboardController as MainDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', MainDashboard::class)->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'role:admin', '2fa'])->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
        Route::post('logout', 'logout')->name('admin.logout');
    });

    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('admin.profile');
        Route::get('edit-profile', 'edit')->name('admin.edit-profile');
        Route::put('update-profile/{user}', 'update')->name('admin.profile.update');
        Route::get('update-password', 'updatePasswordView')->name('admin.update.password');
        Route::put('update-password/{user}', 'updatePassword')->name('admin.password.update');
    });

    Route::controller(AdminTwoFactorAuthController::class)->group(function () {
        Route::get('/profile/2fa', 'show2faForm')->name('profile.2fa');
        Route::post('/profile/2fa/enable', 'enable2fa')->name('profile.2fa.enable');
        Route::delete('/profile/2fa/disable', 'disable2fa')->name('profile.2fa.disable');

        Route::get('/2fa/verify', 'showVerifyForm')->name('2fa.verify');
        Route::post('/2fa/verify', 'verify')->name('2fa.verify.post');
        Route::post('/2fa/verify/recovery', 'verifyWithRecoveryCode')->name('2fa.verify.recovery');
    });

    Route::get('/activity-log', [ActivityLogController::class, 'index'])
        ->name('admin.activity-log');

    Route::controller(AdminCurrencyController::class)->group(function () {
        Route::get('/currency', 'index')->name('admin.currency.index');
        Route::get('/currency/create', 'create')->name('admin.currency.create');
        Route::post('/currency', 'store')->name('admin.currency.store');
        Route::get('/currency/{currency}', 'show')->name('admin.currency.show');
        Route::get('currency/edit/{currency}', 'edit')->name('admin.edit.currency');
        Route::put('currency/{currency}/update', 'update')->name('admin.update.currency');
    Route::delete('/currency/{currency}/del', 'destroy')->name('admin.currency.destroy');

    });
    // Route::delete('del-currency/{currency}', 'destroy')->name('admin.currency.destroy');

});

Route::prefix('private')->middleware(['auth', 'role:member'])->group(function () {
    Route::controller(MemberDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('member.dashboard');
    });

    Route::controller(MemberProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('member.profile');
        Route::get('edit-profile', 'edit')->name('member.edit-profile');
        Route::put('update-profile', 'update')->name('member.update-profile');
        Route::post('upload-avatar', 'uploadAvatar')->name('member.upload-avatar');
    });
});


require __DIR__ . '/auth.php';
