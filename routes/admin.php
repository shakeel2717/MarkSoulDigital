<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FinanceController;
use Illuminate\Support\Facades\Route;


Route::redirect('/admin', 'admin/dashboard');
Route::prefix('admin/')->name('admin.')->middleware('auth', 'admin', 'verified')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('finance', FinanceController::class);
    Route::name('history.')->prefix('history/')->group(function () {
        Route::view('deposits', 'admin.history.deposits')->name('deposits');
        Route::view('withdrawals', 'admin.history.withdrawals')->name('withdrawals');
        Route::view('withdraw-fees', 'admin.history.withdraw_fees')->name('withdrawals.fees');
        Route::view('all-users', 'admin.history.users')->name('users');
        Route::view('plan-profit', 'admin.history.plan-profit')->name('plan.profit');
    });
});
