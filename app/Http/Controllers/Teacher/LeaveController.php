<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::with('student')->get();
        return view('teacher.leave.index',compact('leaves'));
    }

    public function approve($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->update(['status'=>'approved']);

        return back();
    }

    public function reject($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->update(['status'=>'rejected']);

        return back();
    }
}