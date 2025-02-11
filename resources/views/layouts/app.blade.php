<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Student Management</h1>
        <nav>
            <a href="{{ route('students.index') }}">Dashboard</a> |
            <a href="{{ route('students.create') }}">Add Student</a>
        </nav>
    </header>

    <main>
        @yield('content') <!-- This is where child views will be injected -->
    </main>

    <footer>
        <p>&copy; 2025 Student Management System</p>
    </footer>
</body>
</html>
