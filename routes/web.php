<?php

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

// routes/web.php

use App\Http\Controllers\UserController;

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');



