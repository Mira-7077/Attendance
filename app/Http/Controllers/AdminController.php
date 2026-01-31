<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Subject;

class AdminController extends Controller
{
    public function index() {
        $students = User::where('role_id', 2)->count();
        $teachers = User::where('role_id', 3)->count();
        $sections = Section::count();
        $subjects = Subject::count();

        return view('admin.dashboard', compact('students','teachers','sections','subjects'));
    }
}
