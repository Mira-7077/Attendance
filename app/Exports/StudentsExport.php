<?php
namespace App\Exports;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class StudentsExport implements FromCollection
class StudentsExport implements FromCollection, WithHeadings
{
    protected $semester_id;

    public function __construct($semester_id)
    {
        $this->semester_id = $semester_id;
    }

    public function collection()
    {
        
        $students = User::where('role_id', 2)->get(); 
        $data = [];

        foreach ($students as $student) {

            
            $sectionIds = DB::table('student_sections')
                ->join('sections', 'student_sections.section_id', '=', 'sections.id')
                ->where('student_sections.student_id', $student->id)
                ->where('sections.semester_id', $this->semester_id)
                ->pluck('section_id');

            if($sectionIds->isEmpty()) {
                continue; 
            }


            $assignmentIds = DB::table('teacher_subject_section')
            ->whereIn('section_id', $sectionIds)
             ->pluck('id');

            
            $attendances = Attendance::where('student_id', $student->id)
                ->whereIn('teacher_subject_section_id', $assignmentIds)
                ->get();

            $total = $attendances->count();
            $present = $attendances->where('status', 'present')->count();

            
            $percentage = $total > 0 ? round(($present / $total) * 100, 2) : 0;

           

            $data[] = [
               $student->name,
               $student->email,
                $total,
               $present,
               $total - $present,
               $percentage . '%',
];
        }

        return collect($data);
    }

    public function headings(): array
   {
    return [
        'Name',
        'Email',
        'Total Classes',
        'Present',
        'Absent',
        'Attendance Percentage'
    ];
}
}
