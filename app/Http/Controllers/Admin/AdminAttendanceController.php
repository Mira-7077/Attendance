<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;

class AdminAttendanceController extends Controller
{
    public function index()
    {
        
        $attendances = Attendance::with('student')
                        ->orderBy('date','desc')
                        ->get();

        return view('admin.attendance.index', compact('attendances'));
    }
}