<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('landing-page');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register-process', [RegisterController::class, 'store'])->name('register-process');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login-process');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
// Route::get('/home-admin', [ResidentsController::class, 'index']);

/* activity*/
Route::get('/add-activity-admin', [ActivityController::class, 'create']);
Route::post('/add-activity-admin', [ActivityController::class, 'store']);
Route::get('/activity-admin', [ActivityController::class, 'index'])->name('activity-admin');
Route::get('activity-admin/edit/{activity_id}', [ActivityController::class, 'edit'])->name('activity.edit');
Route::put('activity-admin/update/{activity_id}', [ActivityController::class, 'update'])->name('activity.update');
Route::delete('activity-admin/delete/{activity_id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

/*report*/
Route::get('/report-admin', [ReportController::class, 'index']);
Route::post('/report/check/{report_id}', [ReportController::class, 'check'])->name('report.check');
Route::post('/report/reject/{report_id}', [ReportController::class, 'reject'])->name('report.reject');

/* residents */
Route::get('/add-resident-admin', [ActivityController::class, 'create']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['isAdmin:ADMIN']], function () {
        // Route::resource('admin', AdminController::class);
        Route::get('/home-admin', [ResidentsController::class, 'index'])->name('home-admin');
    });
    Route::group(['middleware' => ['isAdmin:USER']], function () {
        // Route::resource('user', UserController::class);
        Route::get('/home-user', [UserController::class, 'index'])->name('home-user');
    });
});

Route::get('/add-activity-admin', function () {
    return view('pages.admin-pages.add-activity-admin');
});
// Route::get('/home-admin', function () {
//     return view('pages.admin-pages.home-admin');
// })->name('home-admin');

// Route::get('/home-user', function () {
//     return view('pages.user-pages.home-user');
// })->name('home-user');

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['isAdmin:ADMIN']], function () {
//         Route::resource('admin', AdminController::class);
//     });
//     Route::group(['middleware' => ['isAdmin:USER']], function () {
//         Route::resource('user', UserController::class);
//     });
// });

// Route::get('/home-admin', [AdminController::class, 'index'])->name('home-admin')->middleware('auth')->middleware('isAdmin:ADMIN');

// Route::get('/home-user', [UserController::class, 'index'])->name('home-user')->middleware('auth')->middleware('isAdmin:USER');

// Route::get('/report-admin', function () {
//     return view('pages.admin-pages.report-admin');
// })->name('report-admin');

// Route::get('/activity-admin', function () {
//     return view('pages.admin-pages.activity-admin');
// })->name('activity-admin');


// Route::get('/edit-activity-admin', function () {
//     return view('pages.admin-pages.edit-activity-admin');
// });
