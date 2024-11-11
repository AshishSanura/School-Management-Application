<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use App\Mail\AnnouncementMail;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'target' => 'required',
        ]);

        $announcement = Announcement::create([
            'title' => $request->title,
            'message' => $request->message,
            'target' => $request->target,
            'user_id' => Auth::id(),
        ]);

        // Send email to the targeted group (Students/Parents)
        $this->sendAnnouncementEmail($announcement);

        return redirect()->route('announcements.index')->with('success', 'Announcement posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $student)
    {
        //
    }

    private function sendAnnouncementEmail(Announcement $announcement)
    {
        // Logic to send email to students or parents
        if ($announcement->target === 'student') {
            $students = \App\Models\Student::all();
            foreach ($students as $student) {
                Mail::to($student->email)->send(new AnnouncementMail($announcement));
            }
        } elseif ($announcement->target === 'parent') {
            // Send email to all parents
            $parents = \App\Models\Parents::all();
            foreach ($parents as $parent) {
                Mail::to($parent->email)->send(new AnnouncementMail($announcement));
            }
        } else {
            // Send email to both
            $students = \App\Models\Student::all();
            $parents = \App\Models\Parents::all();
            foreach ($students as $student) {
                Mail::to($student->email)->send(new AnnouncementMail($announcement));
            }
            foreach ($parents as $parent) {
                Mail::to($parent->email)->send(new AnnouncementMail($announcement));
            }
        }
    }

}
