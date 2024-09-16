<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function showRegistrationForm()
    {
        $courses = Course::all(); // Retrieve all courses
        return view('auth.student_register', compact('courses'));
    }

     // Show student login form
     public function showLoginForm()
    {
        return view('auth.student_login'); // Ensure this view file exists
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

     public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
            'courses' => 'required|array', // Validate that courses is an array
            'courses.*' => 'exists:courses,id', // Validate each course ID
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the student record
        $student = Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Attach selected courses to the student
        $student->courses()->sync($request->input('courses'));

        // Optionally, log in the student
        // auth()->login($student); // Uncomment if you want to log in the student automatically

        // Redirect to a specific route with a success message
        return redirect()->route('student.dashboard')->with('success', 'Student registered successfully.');
    }
 
     // Show student dashboard
     public function dashboard()
     {
         $student = Auth::guard('student')->user();
         $courses = $student->courses; // Assuming relationship in Student model
         $results = $student->results; // Assuming relationship in Student model
 
         return view('student.dashboard', compact('courses', 'results'));     }
}
