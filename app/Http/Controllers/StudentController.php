<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show the form to create a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a new student in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    // Show the form to edit an existing student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the student's details
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
