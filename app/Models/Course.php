<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description'];

    // Relationship with Student
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    // Relationship with Result
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
