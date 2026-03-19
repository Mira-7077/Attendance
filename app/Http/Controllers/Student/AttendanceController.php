<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with([
            'assignment.section',
            'assignment.subject'
        ])
        ->where('student_id', Auth::id())
        ->orderBy('date', 'desc')
        ->get();

        return view('students.attendance.index', compact('attendances'));
    }
}