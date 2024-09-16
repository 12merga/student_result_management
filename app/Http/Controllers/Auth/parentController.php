<?php

namespace App\Http\Controllers\Auth;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class parentController extends Controller
{
    //parent dashboard
    public function dashboard()
    {
        $parent = auth('parent')->user();
        $children = $parent->students; // Assuming relationship in Parent model

        return view('parent.dashboard', compact('children'));
    }
    
     // Show parent registration form
     public function showRegistrationForm()
     {
         return view('parent.register');
     }
 
     // Handle parent registration
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:parents',
             'phone' => 'required|unique:parents',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         // Create parent
         $parent = Parent::create([
             'name' => $request->name,
             'email' => $request->email,
             'phone' => $request->phone,
             'password' => Hash::make($request->password),
         ]);
 
         return redirect()->route('parent.login');
         
         return redirect()->route('parent.dashboard')->with('success', 'Parent registered successfully.');
     }
 
     // Show student registration form (for logged-in parent)
     public function showStudentRegistrationForm()
     {
         return view('student.register');
     }
 
     // Handle student registration by parent
     public function registerStudent(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'class' => 'required|string',
             'dob' => 'required|date',
         ]);
 
         // Generate a unique student ID
         $student_id = 'STU' . strtoupper(uniqid());
 
         // Create student
         $student = Student::create([
             'name' => $request->name,
             'class' => $request->class,
             'dob' => $request->dob,
             'parent_id' => auth()->id(),
             'student_id' => $student_id,
             'password' => Hash::make('default_password'), // default password
         ]);
 
         return redirect()->route('parent.dashboard')->with('success', 'Student registered successfully.');
     }
}
