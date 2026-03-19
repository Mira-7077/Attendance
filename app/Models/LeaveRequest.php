<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'student_id',
          'title',
        'reason',
        'leave_date',
        'status',
         'approved_by'
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}