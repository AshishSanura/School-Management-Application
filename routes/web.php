<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('teachers', TeacherController::class);
    Route::get('show_student', [TeacherController::class, 'showStudent'])->name('show_student');
    Route::get('show_parents', [TeacherController::class, 'showParents'])->name('show_parents');
    Route::get('show_announcements', [TeacherController::class, 'showAnnouncements'])->name('show_announcements');
});

Route::middleware(['auth', 'teacher'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('parents', ParentController::class);
    Route::resource('announcements', AnnouncementController::class);
});
