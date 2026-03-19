<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subject;
use App\Models\Section;
use App\Models\TeacherSubjectSection;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Assignment;

class TeacherAssignmentController extends Controller
{
    public function index()
    {
        $assignments = TeacherSubjectSection::with([
            'teacher',
            'subject',
            'section'
        ])->get();

        return view('admin.assignments.index', compact('assignments'));
    }

    public function create()
    {
        
         $teacherRoleId = Role::where('name', 'teacher')->first()->id;
         $teachers = User::where('role_id', $teacherRoleId)->get();

        $subjects = Subject::all();
        $sections = Section::all();

        return view('admin.assignments.create', compact(
            'teachers',
            'subjects',
            'sections'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
        ]);

        TeacherSubjectSection::create($request->all());

        return redirect()
            ->route('admin.assignments.index')
            ->with('success', 'Class assigned to teacher');
    }


    public function edit($id)
    {
    $assignment = TeacherSubjectSection::findOrFail($id); 

    $teacherRoleId = Role::where('name', 'teacher')->first()->id;
    $teachers = User::where('role_id', $teacherRoleId)->get();
    $subjects = Subject::all();
    $sections = Section::all();

    return view('admin.assignments.edit', compact('assignment', 'teachers', 'subjects', 'sections'));
   }

    public function update(Request $request, $id)
    {
    $request->validate([
        'teacher_id' => 'required|exists:users,id',
        'subject_id' => 'required|exists:subjects,id',
        'section_id' => 'required|exists:sections,id',
    ]);

    $assignment = TeacherSubjectSection::findOrFail($id); 
    $assignment->update($request->all());

    return redirect()->route('admin.assignments.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy($id)
    {
    $assignment = TeacherSubjectSection::findOrFail($id); 
    $assignment->delete();

    return redirect()->route('admin.assignments.index')->with('success', 'Assignment deleted successfully.');
    }

    }


