<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register-process', [RegisterController::class, 'store'])->name('register-process');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login-process');
// Route::get('/home-user', function () {
//     dd(Auth::user());
// })->name('home-user');

// Route::get('/home-admin', function () {
//     dd(Auth::user());
// })->name('home-admin');

// Route::get('/home-admin', [AdminController::class, 'index'])->name('home-admin')->middleware('auth')->middleware('isAdmin:ADMIN');

// Route::get('/home-user', [UserController::class, 'index'])->name('home-user')->middleware('auth')->middleware('isAdmin:USER');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['isAdmin:ADMIN']], function () {
        Route::resource('admin', AdminController::class);
        // Route::get('/home-admin', [AdminController::class, 'index'])->name('home-admin');
    });
    Route::group(['middleware' => ['isAdmin:USER']], function () {
        Route::resource('user', UserController::class);
        // Route::get('/home-user', [UserController::class, 'index'])->name('home-user');
    });
});
