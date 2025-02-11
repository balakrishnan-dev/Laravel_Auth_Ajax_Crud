<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();  // Retrieve all students
        return view('students.index', compact('students'));  // Pass students to the view
    }

    // Show the form to add a new student
    public function create()
    {
        return view('students.create');  // Show form for adding student
    }

    // Store a new student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
        ]);

        Student::create($request->all());  // Create and save new student

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Show the edit form for a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);  // Find the student to edit
        return view('students.edit', compact('student'));  // Return the edit form
    }

    // Update the student data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
        ]);

        $student = Student::findOrFail($id);  // Find the student by ID
        $student->update($request->all());  // Update student data

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();  // Delete student from database

        return response()->json(['success' => 'Student deleted successfully']);
    }

    // Fetch all students (for AJAX)
    public function fetchStudents()
    {
        $students = Student::all();  // Retrieve all students for AJAX response
        return response()->json($students);  // Return students as JSON
    }
}
