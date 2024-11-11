<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define fillable properties for mass assignment protection
    protected $fillable = [
        'name',
        'email',
        // Add other fields as required
    ];

    // Example: A Student may belong to a Parent (one-to-many relationship)
    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }

    // Example: A Student may have many Announcements (if you decide to relate announcements to students)
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    // Other methods (edit, update, destroy) can be managed by controllers, not necessarily here
}
