


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Teacher\AttendanceController;

use App\Http\Controllers\StudentController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SectionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Fortify Auth Routes (DO NOT CHANGE)
|--------------------------------------------------------------------------
*/
Route::get('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [\Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [\Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store']);


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Student CRUD (Resource)
    Route::resource('admin/students', StudentController::class, [
        'as' => 'admin' // Prefix route names with 'admin.'
    ]);

    Route::resource('admin/teachers', AdminTeacherController::class, [
        'as' => 'admin' // Prefix route names with 'admin.'
    ]);

    Route::resource('admin/subjects', AdminSubjectController::class, [
    'as' => 'admin'
]);
   Route::resource('admin/semesters', SemesterController::class, [
        'as' => 'admin'
    ]);

     Route::resource('sections', SectionController::class);
});


Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])
        ->name('teacher.dashboard');
});


Route::middleware(['auth', RoleMiddleware::class . ':student'])->group(function () {

    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');
});

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/attendance/{assignment}',
        [AttendanceController::class, 'create']
    )->name('teacher.attendance.create');

    Route::post('/teacher/attendance',
        [AttendanceController::class, 'store']
    )->name('teacher.attendance.store');

});
