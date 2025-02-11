<table id="studentTable">
    <thead>
        <tr>
            <th>Name</th><th>Age</th><th>Phone</th><th>Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<button id="addStudent">Add Student</button>

<script>

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    fetchStudents();

    function fetchStudents() {
        $.get('/students', function (data) {
            $('#studentTable tbody').html('');
            $.each(data, function (key, student) {
                $('#studentTable tbody').append(`
                    <tr>
                        <td>${student.name}</td>
                        <td>${student.age}</td>
                        <td>${student.phone}</td>
                        <td>
                            <button onclick="window.location.href='/students/${student.id}/edit'">Edit</button>
                            <button onclick="deleteStudent(${student.id})">Delete</button>
                        </td>
                    </tr>
                `);
            });
        });
    }

$(document).ready(function () {
    $('#addStudent').click(function () {
        window.location.href = '/students/add';  // This will redirect to /students/add
    });
});

    function deleteStudent(id) {
        $.ajax({
            url: `/students/${id}`,
            type: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function () { fetchStudents(); }
        });
    }
});
</script>
