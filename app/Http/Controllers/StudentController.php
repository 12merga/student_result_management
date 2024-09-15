<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Show the student dashboard
    public function dashboard()
    {
        // Get the authenticated student
        $student = Auth::guard('student')->user();

        // Fetch the student's courses and their results
        $courses = $student->courses;
        $results = $student->results;

        return view('student.dashboard', compact('student', 'courses', 'results'));
    }
}
