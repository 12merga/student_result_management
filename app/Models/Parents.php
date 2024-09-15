<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Parents extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    // Relationship with Student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
