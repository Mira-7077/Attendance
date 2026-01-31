<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\TeacherSubjectSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create($assignmentId)
    {
        $assignment = TeacherSubjectSection::with('section.students')
            ->findOrFail($assignmentId);

        if ($assignment->teacher_id !== Auth::id()) {
            abort(403);
        }

        $students = $assignment->section->students;
        $today = now()->toDateString();

        return view('teacher.attendance.create', compact(
            'assignment',
            'students',
            'today'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_subject_section_id' => 'required|exists:teacher_subject_section,id',
            'attendance' => 'required|array'
        ]);

        foreach ($request->attendance as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'teacher_subject_section_id' => $request->teacher_subject_section_id,
                    'date' => now()->toDateString(),
                ],
                [
                    'status' => $status
                ]
            );
        }

        return redirect()
            ->route('teacher.dashboard')
            ->with('success', 'Attendance saved successfully');
    }
}
