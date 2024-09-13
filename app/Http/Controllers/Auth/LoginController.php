<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController; // Correct base class

class LoginController extends Controller
{
    // Apply middleware for guest users
    public function __construct()
    {
        $this->middleware('guest')->except('logout');  // This will apply guest middleware to all methods except logout
    }

    /**
     * Handle post-login redirection based on user roles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated($request, $user)
    {
        // Check the user's role and redirect accordingly
        switch ($user->role->id) {
            case 1:
                return redirect()->route('register.dashboard');
            case 2:
                return redirect()->route('exam_controller.dashboard');
            case 3:
                return redirect()->route('dept_office.dashboard');
            case 4:
                return redirect()->route('teacher.dashboard');
            default:
                return redirect()->route('student.dashboard');
        }
    }
}
