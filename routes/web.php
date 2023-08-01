<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('user/')->name('user.')->middleware('auth', 'user','verified')->group(function () {
    Route::resource('dashboard', DashboardController::class);
});

Route::get('/privacy', [LandingPageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LandingPageController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [LandingPageController::class, 'disclaimer'])->name('disclaimer');


Route::post('/contact', [LandingPageController::class, 'contactStore'])->name('contact.store');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::resource('/', LandingPageController::class);
Route::resource('/post', PostController::class);
Route::resource('/newsletter', NewsLetterController::class);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
