<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'class', 'dob', 'parent_id', 'student_id', 'password'];

    // Relationship with Parent
    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    // Relationship with Course
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

    // Relationship with Result
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
