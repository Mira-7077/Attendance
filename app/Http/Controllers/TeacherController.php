<?php

namespace App\Http\Controllers;

use App\Models\TeacherSubjectSection;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $assignments = TeacherSubjectSection::with(['subject', 'section'])
            ->where('teacher_id', Auth::id())
            ->get();

        return view('teacher.dashboard', compact('assignments'));
    }
}
