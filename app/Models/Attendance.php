<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'student_attendance';

    protected $fillable = [
        'student_id',
        'teacher_subject_section_id',
        'date',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function assignment()
    {
        return $this->belongsTo(
            TeacherSubjectSection::class,
            'teacher_subject_section_id'
        );
    }

    public function teacherSUbjectSection()
    {
      return $this->belongsTo(TeacherSUbjectSection::class,'teacher_subject_section-id');
    }

}
