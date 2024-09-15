<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
