<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::where('student_id',Auth::id())->get();
        return view('students.leave.index',compact('leaves'));
    }

    public function create()
    {
        return view('students.leave.create');
    }

    public function store(Request $request)
    {
        $request->validate([
             'title' => 'required',
            'reason'=>'required',
            'leave_date'=>'required|date'

        ]);

        LeaveRequest::create([
            'student_id'=>Auth::id(),
            'title' => $request->title,
            'reason'=>$request->reason,
            'leave_date'=>$request->leave_date,
             'status' => 'pending'
        ]);

        return redirect()->back()->with('success','Leave request sent');
    }
}