<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::resource('/', LandingPageController::class);
Route::resource('/post', PostController::class);
Route::resource('/newsletter', NewsLetterController::class);

require __DIR__ . '/auth.php';
