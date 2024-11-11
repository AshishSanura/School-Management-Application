<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    // Define fillable properties for mass assignment protection
    protected $fillable = [
        'name',
        'email',
        // Add other fields as required
    ];

    // Example: A Parent has many Students (one-to-many relationship)
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Example: A Parent may have many Announcements (if announcements are sent to parents)
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    // Other methods (edit, update, destroy) can be managed by controllers, not necessarily here
}

