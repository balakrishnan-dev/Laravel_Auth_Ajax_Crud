@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $student->name }}" required>
        </div>

        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" value="{{ $student->age }}" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ $student->phone }}" required>
        </div>

        <button type="submit">Update Student</button>
    </form>
@endsection
