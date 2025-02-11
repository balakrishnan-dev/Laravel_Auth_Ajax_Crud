<form id="editStudentForm">
    @csrf
    @method('PUT')
    <input type="hidden" id="student_id" value="{{ $student->id }}">
    <input type="text" id="name" value="{{ $student->name }}" required>
    <input type="number" id="age" value="{{ $student->age }}" required>
    <input type="text" id="phone" value="{{ $student->phone }}" required>
    <button type="submit">Update Student</button>
</form>

<script>
$(document).ready(function () {
    $('#editStudentForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: `/students/${$('#student_id').val()}`,
            type: 'PUT',
            data: {
                name: $('#name').val(),
                age: $('#age').val(),
                phone: $('#phone').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function () {
                window.location.href = '/dashboard';
            }
        });
    });
});
</script>
