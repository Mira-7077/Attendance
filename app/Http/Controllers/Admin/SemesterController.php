<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    
    public function index()
    {
        $semesters = Semester::orderBy('start_date', 'desc')->get();
        return view('admin.semesters.index', compact('semesters'));
    }

    
    public function create()
    {
        return view('admin.semesters.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
        ]);

        Semester::create($request->all());

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester created successfully');
    }

    
    public function edit(Semester $semester)
    {
        return view('admin.semesters.edit', compact('semester'));
    }

    
    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
        ]);

        $semester->update($request->all());

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester updated successfully');
    }

    
    public function destroy(Semester $semester)
    {
        
        if ($semester->sections()->exists()) {
            return back()->with('error', 'Cannot delete semester with existing sections');
        }

        $semester->delete();

        return redirect()
            ->route('admin.semesters.index')
            ->with('success', 'Semester deleted successfully');
    }
}
