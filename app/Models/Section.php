<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name',
        'semester_id'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    // Students in section
    public function students()
    {
        return $this->belongsToMany(User::class, 'student_section', 'section_id', 'student_id');
    }

    // Subjects taught in section
    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubjectSection::class);
    }
}
