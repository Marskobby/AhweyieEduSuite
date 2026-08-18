<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolSettingsController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | School Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:school_admin')->group(function () {

        // User Management
        Route::get('/users', [UserManagementController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [UserManagementController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserManagementController::class, 'store'])
            ->name('users.store');

        // School Settings
        Route::get('/school-settings', [SchoolSettingsController::class, 'edit'])
            ->name('school-settings.edit');

        Route::put('/school-settings', [SchoolSettingsController::class, 'update'])
            ->name('school-settings.update');

        
            Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
                ->name('users.edit');

        Route::put('/users/{user}', [UserManagementController::class, 'update'])
            ->name('users.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/academic-years', [AcademicYearController::class, 'index'])
        ->name('academic-years.index');

    Route::get('/academic-years/create', [AcademicYearController::class, 'create'])
        ->name('academic-years.create');

    Route::post('/academic-years', [AcademicYearController::class, 'store'])
        ->name('academic-years.store');

    Route::get('/academic-years/{academicYear}/edit', [AcademicYearController::class, 'edit'])
        ->name('academic-years.edit');

    Route::put('/academic-years/{academicYear}', [AcademicYearController::class, 'update'])
        ->name('academic-years.update');

    Route::patch('/academic-years/{academicYear}/activate', [AcademicYearController::class, 'activate'])
        ->name('academic-years.activate');

    Route::patch('/academic-years/{academicYear}/deactivate', [AcademicYearController::class, 'deactivate'])
        ->name('academic-years.deactivate');
});
        // Role middleware test
        Route::get('/admin-test', function () {
            return 'School Admin access granted!';
        });
    });

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

require __DIR__.'/auth.php';