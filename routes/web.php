<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\LockerKeyController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated System
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Employee Management
    |--------------------------------------------------------------------------
    */

    Route::resource('employees', EmployeeController::class);

    /*
    |--------------------------------------------------------------------------
    | Auto Locker Recommendation
    |--------------------------------------------------------------------------
    */

    Route::post('/employees/recommend-locker', [EmployeeController::class, 'recommendLocker'])
        ->name('employees.recommendLocker');

    /*
    |--------------------------------------------------------------------------
    | Locker Management
    |--------------------------------------------------------------------------
    */

    // Diletakkan sebelum Route::resource('lockers') agar segment "/status" tidak bentrok
    Route::patch('/lockers/{locker}/status', [LockerController::class, 'updateStatus'])
        ->name('lockers.updateStatus');

    Route::resource('lockers', LockerController::class);

    /*
    |--------------------------------------------------------------------------
    | Key Monitoring
    |--------------------------------------------------------------------------
    */

    Route::resource('keys', LockerKeyController::class);

    /*
    |--------------------------------------------------------------------------
    | Report System
    |--------------------------------------------------------------------------
    */

    Route::get('/report', [ReportController::class, 'index'])
        ->name('report.index');

    Route::get('/report/pdf', [ReportController::class, 'pdf'])
        ->name('report.pdf');

    Route::get('/report/excel', [ReportController::class, 'excel'])
        ->name('report.excel');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';