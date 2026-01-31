<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Attendance extends Model
// {
//     protected $fillable = [
//         'teacher_id',
//         'student_id',
//         'section_id',
//         'subject_id',
//         'date',
//         'status'
//     ];

//     public function teacher()
//     {
//         return $this->belongsTo(User::class, 'teacher_id');
//     }

//     public function student()
//     {
//         return $this->belongsTo(User::class, 'student_id');
//     }

//     public function section()
//     {
//         return $this->belongsTo(Section::class);
//     }

//     public function subject()
//     {
//         return $this->belongsTo(Subject::class);
//     }
// }





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
}
