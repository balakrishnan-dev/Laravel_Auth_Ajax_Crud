@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="container mt-5">
        <h2 class="text-center mb-4">Student List</h2>
        
        <!-- Table with modern design -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr id="student-{{ $student->id }}">
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <button class="btn btn-danger btn-sm deleteStudent" data-id="{{ $student->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Floating action button -->
        <div class="fixed-bottom mb-4 mr-4">
            <a href="{{ route('students.create') }}" class="btn btn-success btn-lg rounded-circle">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>

    <!-- Add jQuery and AJAX handling -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.deleteStudent', function() {
            var studentId = $(this).data('id');
            if (confirm('Are you sure you want to delete this student?')) {
                $.ajax({
                    url: '/students/' + studentId,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        $('#student-' + studentId).remove();
                        alert(response.success);
                    }
                });
            }
        });
    </script>
@endsection

@section('styles')
    <style>
        table {
            font-size: 16px;
        }

        /* Improve table style */
        .table {
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
        }

        .thead-dark {
            background-color: #343a40;
            color: white;
        }

        /* Button styling */
        .btn-sm {
            margin-right: 8px;
            padding: 8px 12px;
        }

        .btn-warning {
            border-radius: 4px;
        }

        .btn-danger {
            border-radius: 4px;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 15px;
        }

        /* Floating Action Button */
        .fixed-bottom .btn-success {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 20px;
            padding: 15px;
        }

        /* Table hover effect */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling for mobile view */
        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
@endsection
