<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\TimecheckController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Employee Routes
Route::resource('employees', EmployeeController::class);

// Shift Routes
Route::resource('shifts', ShiftController::class);

// Attendance Routes
Route::resource('attendances', AttendanceController::class);

// Leave Routes
Route::resource('leaves', LeaveController::class);

// Holiday Routes
Route::resource('holidays', HolidayController::class);

// Overtime Routes
Route::resource('overtimes', OvertimeController::class);

// Timecheck Routes
Route::resource('timechecks', TimecheckController::class);

// Day Routes
Route::resource('days', DayController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
