<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = User::where('role_id', 2)->get();
        return view('admin.students.index', compact('students'));
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


}
