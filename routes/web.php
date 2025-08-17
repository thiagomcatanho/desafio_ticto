<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TimeRecordController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('auth.authenticate');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Home
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });

    // Logout
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('auth.logout');
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(CheckRole::class . ':admin')->group(function () {
        // Users Management (CRUD)
        Route::resource('users', UserController::class)->except('show');

        // Reports
        Route::controller(ReportController::class)->group(function () {
            Route::get('/report/users', 'usersReport')->name('report.users');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Employee Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(CheckRole::class . ':employee')->group(function () {
        // Password management
        Route::controller(MeController::class)->prefix('me')->group(function () {
            Route::get('edit-password', 'editPassword')->name('me.edit_password');
            Route::patch('update-password', 'updatePassword')->name('me.update_password');
        });

        Route::post('time-records', [TimeRecordController::class, 'storeTimeRecord'])->name('time_record.store');
    });
});
