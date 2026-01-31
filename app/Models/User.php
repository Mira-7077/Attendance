<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;
use App\Models\Section;
use App\Models\TeacherSubjectSection;
use App\Models\Attendance;



// class User extends Authenticatable
// {
//      use HasFactory, Notifiable;


//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//         'role_id',
//         'is_admin',
//     ];

//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     public function role()
//     {
//         return $this->belongsTo(Role::class);
//     }

    
//     public function sections()
//     {
//         return $this->belongsToMany(Section::class, 'student_section', 'student_id', 'section_id');
//     }

//     public function teacherAssignments()
//     {
//         return $this->hasMany(TeacherSubjectSection::class, 'teacher_id');
//     }

    
//     public function attendances()
//     {
//         return $this->hasMany(Attendance::class, 'teacher_id');
//     }


// }


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /*
    |-------------------------------------------------
    | STUDENT relationship
    |-------------------------------------------------
    */
    public function studentSections()
    {
        return $this->belongsToMany(
            Section::class,
            'student_section',
            'student_id',
            'section_id'
        );
    }

    /*
    |-------------------------------------------------
    | TEACHER / ADMIN relationship
    |-------------------------------------------------
    */
    public function teachingSections()
    {
        return $this->hasMany(
            Section::class,
            'teacher_id'
        );
    }

    /*
    |-------------------------------------------------
    | Other relationships
    |-------------------------------------------------
    */
    public function teacherAssignments()
    {
        return $this->hasMany(
            TeacherSubjectSection::class,
            'teacher_id'
        );
    }

    public function attendances()
    {
        return $this->hasMany(
            Attendance::class,
            'teacher_id'
        );
    }
}
