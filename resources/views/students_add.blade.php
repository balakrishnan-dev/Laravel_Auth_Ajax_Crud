<form id="addStudentForm">
    @csrf
    <input type="text" id="name" placeholder="Name" required>
    <input type="number" id="age" placeholder="Age" required>
    <input type="text" id="phone" placeholder="Phone" required>
    <button type="submit">Add Student</button>
</form>

<script>
$(document).ready(function () {
    $('#addStudentForm').submit(function (e) {
        e.preventDefault();
        $.post('/students', {
            name: $('#name').val(),
            age: $('#age').val(),
            phone: $('#phone').val(),
            _token: '{{ csrf_token() }}'
        }, function () {
            window.location.href = '/dashboard';
        });
    });
});
</script>
