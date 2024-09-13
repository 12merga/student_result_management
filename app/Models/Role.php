<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // If you are using model factories
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; // Optional if you're using model factories

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles'; // Not strictly necessary if you follow Laravel's naming conventions

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug']; // Specify the fillable attributes

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
