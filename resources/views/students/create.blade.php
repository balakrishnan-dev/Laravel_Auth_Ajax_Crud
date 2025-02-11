@extends('layouts.app')

@section('content')
    <h1>Add New Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required>
        </div>

        <button type="submit">Add Student</button>
    </form>
@endsection
