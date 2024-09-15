<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = auth()->user();
        $courses = $teacher->courses; // Assuming relationship in Teacher model

        return view('teacher.dashboard', compact('courses'));
    }
}
