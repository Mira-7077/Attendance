


 @extends('layouts.teacher')

@section('content')
<div class="container">

    <h4 class="mb-3">
        Attendance –
        {{ $assignment->subject->name }}
        ({{ $assignment->section->name }})
    </h4>

    <p><strong>Date:</strong> {{ $today }}</p>

    <form method="POST" action="{{ route('teacher.attendance.store') }}">
        @csrf

        <input type="hidden"
               name="teacher_subject_section_id"
               value="{{ $assignment->id }}">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>

            <tbody>
                @foreach($students as $student)
                    <tr>

                        <td>{{ $student->name }}</td>

                        <td>
                            <select name="attendance[{{ $student->id }}]"
                                    class="form-select">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="late">Late</option>
                            </select>
                        </td>

                        
                        <td>
                            <button type="button"
                                    class="btn btn-sm btn-info viewDetail"
                                    data-id="{{ $student->id }}">
                                Detail View
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-success">
            Save Attendance
        </button>
    </form>

</div>



<div class="modal fade" id="studentModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Student Attendance Performance</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<p><strong>Name:</strong> <span id="s_name"></span></p>
<p><strong>Email:</strong> <span id="s_email"></span></p>
<p><strong>Total Classes:</strong> <span id="s_total"></span></p>
<p><strong>Present:</strong> <span id="s_present"></span></p>
<p><strong>Absent:</strong> <span id="s_absent"></span></p>
<p><strong>Attendance %:</strong> <span id="s_percentage"></span>%</p>

</div>

</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    $('.viewDetail').click(function(){

        var id = $(this).data('id');

        $.get('/students/' + id + '/detail', function(data){

            $('#s_name').text(data.name);
            $('#s_email').text(data.email);
            $('#s_total').text(data.total);
            $('#s_present').text(data.present);
            $('#s_absent').text(data.absent);
            $('#s_percentage').text(data.percentage);

            var modal = new bootstrap.Modal(document.getElementById('studentModal'));
            modal.show();

        });

    });

});
</script>

@endsection