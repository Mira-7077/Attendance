

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Students</h2>

        <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Student
        </a>    
    </div>
 
<form action="" method="GET" id="exportForm" class="mb-3">
    <select name="semester_id" id="semesterSelect" class="form-select mb-2">
        @foreach($semesters as $semester)
            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Export Semester Attendance</button>
</form>

<script>
const form = document.getElementById('exportForm');
const select = document.getElementById('semesterSelect');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    const semesterId = select.value;
    window.location.href = `/admin/students/export/semester/${semesterId}`;
});
</script>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>

            <td>

                
                <button class="btn btn-sm btn-info viewDetail"
                        data-id="{{ $student->id }}">
                    Detail View
                </button>

                <a href="{{ route('admin.students.edit', $student->id) }}"
                   class="btn btn-sm btn-warning">
                   Edit
                </a>

                <form action="{{ route('admin.students.destroy', $student->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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


<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
$(document).ready(function(){

    $('.viewDetail').click(function(){

        var id = $(this).data('id');

        $.get('/admin/students/' + id + '/detail', function(data){

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