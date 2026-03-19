<?php

namespace App\Http\Controllers;

use App\Models\StudentSection;
use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentSectionController extends Controller
{
    public function index()
    {
        $assignments = StudentSection::with(['student', 'section'])->get();

        return view('student_section.index', compact('assignments'));
    }

    public function create()
    {
        $students = User::where('role_id', 2)->get();
        $sections = Section::all();

        return view('student_section.create', compact('students', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        StudentSection::create([
            'student_id' => $request->student_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('student-section.index')
            ->with('success', 'Student assigned successfully.');
    }

    public function edit($id)
    {
        $assignment = StudentSection::findOrFail($id);
        $students = User::where('role_id', 2)->get();
        $sections = Section::all();

        return view('student_section.edit',
            compact('assignment', 'students', 'sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $assignment = StudentSection::findOrFail($id);

        $assignment->update([
            'student_id' => $request->student_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('student-section.index')
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy($id)
    {
        StudentSection::findOrFail($id)->delete();

        return redirect()->route('student-section.index')
            ->with('success', 'Assignment deleted successfully.');
    }
   
}