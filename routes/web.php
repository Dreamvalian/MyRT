<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('pages.login');
});

// Route::get('/register', function () {
//     return view('pages.register');
// });

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/home-admin', [ResidentsController::class, 'index']);
Route::get('/add-activity-admin', [ActivityController::class, 'create']);
Route::post('/add-activity-admin', [ActivityController::class, 'store']);
Route::get('/activity-admin', [ActivityController::class, 'index']);
Route::get('activity-admin/edit/{activity_id}', [ActivityController::class, 'edit'])->name('activity.edit');
Route::put('activity-admin/update/{activity_id}', [ActivityController::class, 'update'])->name('activity.update');
Route::delete('activity-admin/delete/{activity_id}', [ActivityController::class, 'destroy'])->name('activity.destroy');


// Route::get('/home-admin', function () {
//     return view('pages.admin-pages.home-admin');
// })->name('home-admin');

Route::get('/home-user', function () {
    return view('pages.user-pages.home-user');
})->name('home-user');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['isAdmin:ADMIN']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['isAdmin:USER']], function () {
        Route::resource('user', UserController::class);
    });
});

Route::get('/home-user', function () {
    return view('pages.user-pages.home-user');
})->name('home-user');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['isAdmin:ADMIN']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['isAdmin:USER']], function () {
        Route::resource('user', UserController::class);
    });
});

Route::get('/report-admin', function () {
    return view('pages.admin-pages.report-admin');
})->name('report-admin');

// Route::get('/activity-admin', function () {
//     return view('pages.admin-pages.activity-admin');
// })->name('activity-admin');

Route::get('/add-activity-admin', function () {
    return view('pages.admin-pages.add-activity-admin');
});
// Route::get('/edit-activity-admin', function () {
//     return view('pages.admin-pages.edit-activity-admin');
// });
