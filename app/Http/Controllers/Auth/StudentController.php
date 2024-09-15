<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
     // Show student login form
     public function showLoginForm()
     {
         return view('student.login');
     }
 
     // Handle student login
     public function login(Request $request)
     {
         $request->validate([
             'student_id' => 'required|string',
             'password' => 'required|string',
         ]);
 
         // Attempt to authenticate the student
         if (Auth::guard('student')->attempt(['student_id' => $request->student_id, 'password' => $request->password])) {
             return redirect()->route('student.dashboard');
         }
 
         return back()->withErrors(['login' => 'Invalid student ID or password.']);
     }
 
     // Show student dashboard
     public function dashboard()
     {
         $student = Auth::guard('student')->user();
         $courses = $student->courses; // Assuming relationship in Student model
         $results = $student->results; // Assuming relationship in Student model
 
         return view('student.dashboard', compact('courses', 'results'));     }
}
