<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Semester;
use App\Models\Attendance; 

class StudentController extends Controller
{
    
    public function index()
    {
      
     $students = User::where('role_id', 2)->get();
     $semesters = Semester::all(); 
    return view('admin.students.index', compact('students', 'semesters'));
        
    }

    
    public function create()
    {
        return view('admin.students.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // STUDENT
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully');
    }
 
       public function edit($id)
      {
        $student = User::findOrFail($id);
        return view('admin.students.edit', compact('student'));
      }
     
       public function update(Request $request, $id)
      {   
         $student = User::findOrFail($id);

          $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        ]);

        $student->update([
        'name' => $request->name,
        'email' => $request->email,
        ]);

             return redirect()->route('admin.students.index')->with('success', 'Student updated successfully');
}

    public function destroy($id)
   {
       $student = User::findOrFail($id);
      $student->delete();

      return redirect()->route('admin.students.index')
                     ->with('success', 'Student deleted successfully');
       }


    
    public function detail($id)
    {
        $student = User::findOrFail($id);

        $totalClasses = Attendance::where('student_id', $id)->count();

        $present = Attendance::where('student_id', $id)
                    ->where('status', 'present')
                    ->count();

        $absent = Attendance::where('student_id', $id)
                    ->where('status', 'absent')
                    ->count();

        $percentage = 0;

        if ($totalClasses > 0) {
            $percentage = round(($present / $totalClasses) * 100, 2);
        }

        return response()->json([
            'name' => $student->name,
            'email' => $student->email,
            'total' => $totalClasses,
            'present' => $present,
            'absent' => $absent,
            'percentage' => $percentage
        ]);
    }

}