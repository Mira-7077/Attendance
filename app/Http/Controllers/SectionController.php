<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Semester;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('semester')->get();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $semesters = Semester::all();
        return view('sections.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        Section::create([
            'name' => $request->name,
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('sections.index')->with('success', 'Section created.');
    }

    public function edit(Section $section)
    {
        $semesters = Semester::all();
        return view('sections.edit', compact('section', 'semesters'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        $section->update([
            'name' => $request->name,
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('sections.index')->with('success', 'Section updated.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted.');
    }
}
