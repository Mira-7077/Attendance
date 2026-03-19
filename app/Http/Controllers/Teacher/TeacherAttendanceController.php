<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class TeacherAttendanceController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();

        
        $attendances = Attendance::whereHas('teacherSubjectSection', function($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
        })
        ->with('student')
        ->orderBy('date','desc')
        ->get();

        return view('teacher.attendance.index', compact('attendances'));
    }
}