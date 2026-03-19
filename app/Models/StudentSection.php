<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSection extends Model
{
    protected $table = 'student_sections';

    protected $fillable = [
        'student_id',
        'section_id'
    ];
     public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
