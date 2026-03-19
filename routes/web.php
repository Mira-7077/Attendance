<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentSectionController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendanceController;
use App\Http\Controllers\Admin\TeacherAssignmentController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Student\AttendanceController as StudentAttendanceController;
use App\Http\Controllers\Teacher\AttendanceController as TeacherAttendanceController;
use App\Http\Controllers\Student\LeaveController as StudentLeaveController;
use App\Http\Controllers\Teacher\LeaveController as TeacherLeaveController;
use App\Http\Controllers\Admin\LeaveController as AdminLeaveController;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;




// Route::get('/', function () {
//     return view('welcome');
//     //  return redirect()->route('login');
// });
 Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('home');


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

    
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');


    Route::get('/admin/students/export/semester/{id}', [AdminAttendanceController::class, 'exportSemester'])
    ->name('admin.students.export.semester');

     Route::get('/admin/students/{id}/detail', [StudentController::class, 'detail'])
        ->name('admin.students.detail');
    
    Route::resource('admin/students', StudentController::class, ['as' => 'admin' ]);

    Route::resource('admin/teachers', AdminTeacherController::class, [ 'as' => 'admin'  ]);

    Route::resource('admin/subjects', AdminSubjectController::class, ['as' => 'admin']);
   Route::resource('admin/semesters', SemesterController::class, [ 'as' => 'admin']);

     Route::resource('sections', SectionController::class);
});


Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'index']) ->name('teacher.dashboard');
});



Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']) ->name('students.dashboard');
});

    Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {


     Route::get('/teacher/attendance/{assignment}',  [TeacherAttendanceController::class, 'create'])->name('teacher.attendance.create');
  
     Route::post('/teacher/attendance', [TeacherAttendanceController::class, 'store'] )->name('teacher.attendance.store');

});



Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::resource('attendance', AdminAttendanceController::class)->only(['index', 'edit', 'update']);

              Route::resource('assignments', TeacherAssignmentController::class);
    });
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('student-section', StudentSectionController::class);
});

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::get('attendance', [StudentAttendanceController::class, 'index'])
        ->name('student.attendance.index');
});




Route::middleware(['auth'])->group(function () {

    Route::get('/students/{id}/detail', [StudentController::class, 'detail'])
        ->name('students.detail');

});

// Leave
Route::middleware(['auth','role:student'])->group(function(){
    Route::get('/student/leaves',[StudentLeaveController::class,'index']);
    Route::get('/student/leaves/create',[StudentLeaveController::class,'create']);
    Route::post('/student/leaves',[StudentLeaveController::class,'store']);
});


Route::middleware(['auth','role:teacher'])->group(function(){
    Route::get('/teacher/leaves',[TeacherLeaveController::class,'index']);
    Route::get('/teacher/leaves/{id}/approve',[TeacherLeaveController::class,'approve']);
    Route::get('/teacher/leaves/{id}/reject',[TeacherLeaveController::class,'reject']);
});


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/leaves',[AdminLeaveController::class,'index']);
});