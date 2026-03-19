<?php


namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\TeacherSubjectSection;
use App\Models\StudentSection;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $sectionIds = StudentSection::where('student_id', $student->id)
                        ->pluck('section_id');

        $assignmentIds = TeacherSubjectSection::whereIn('section_id', $sectionIds)
                            ->pluck('id');

        $attendances = Attendance::where('student_id', $student->id) ->whereIn('teacher_subject_section_id', $assignmentIds) ->get();

        $totalClasses = $attendances->count();

        $classesAttended = $attendances->where('status', 'present')->count();

        $attendancePercent = $totalClasses > 0
            ? round(($classesAttended / $totalClasses) * 100): 0;

        $totalSubjects = $assignmentIds->count();

        return view('students.dashboard', compact(  'attendancePercent', 'totalSubjects','classesAttended' ));
    }
}