<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::redirect('/admin', 'admin/dashboard');
Route::prefix('admin/')->name('admin.')->middleware('auth', 'admin', 'verified')->group(function () {
    Route::resource('dashboard', DashboardController::class);
});
