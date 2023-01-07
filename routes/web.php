<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\MyAuthController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [MyAuthController::class, 'loginForm'])->name('login');
Route::post('/login', [MyAuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [MyAuthController::class, 'logout'])->name('auth.logout');
Route::get('register/form', [MyAuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AccountController::class, 'store'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [DashBoardController::class, 'index']);

    Route::resource('/accounts', AccountController::class);
});
