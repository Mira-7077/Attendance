<form method="POST" action="/student/leaves">
@csrf

<label>Title</label>
<input type="text" name="title">

<br><br>

<label>Date</label>
<input type="date" name="leave_date" class="form-control">

<label>Reason</label>
<textarea name="reason" class="form-control"></textarea>

<button class="btn btn-primary mt-2">
Send Leave Request
</button>

</form>