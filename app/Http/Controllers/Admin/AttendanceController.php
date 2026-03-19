<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    
    public function index()
    {
        $attendances = Attendance::with([
            'student',
            'assignment.section',
            'assignment.subject'
        ])->orderBy('date','desc')->get();

        return view('admin.attendance.index', compact('attendances'));
    }

    
    public function edit(Attendance $attendance)
    {
        return view('admin.attendance.edit', compact('attendance'));
    }

    //Route model binding
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'status' => 'required|in:present,absent,late'
        ]);

        $attendance->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.attendance.index')
            ->with('success', 'Attendance updated by admin');
    }
     

  

public function exportSemester($semester_id)
{
    
    return Excel::download(new StudentsExport($semester_id), 'semester_attendance.xlsx');
}
}
