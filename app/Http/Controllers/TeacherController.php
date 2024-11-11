<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Announcement;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::where('is_admin', 0)->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash the password and set is_admin to 0
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['is_admin'] = 0;

        User::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Fill all fields except password
        $teacher->fill($request->except('password'));

        // Hash and update password if it is provided
        if ($request->filled('password')) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }

    public function showStudent()
    {
        $teachers = Student::all();
        return view('teachers.showStudent', compact('teachers'));
    }

    public function showParents()
    {
        $parents = Parents::all();
        return view('teachers.showParents', compact('parents'));
    }

    public function showAnnouncements()
    {
        $announcements = Announcement::all();
        return view('teachers.showAnnouncement', compact('announcements'));
    }
}
