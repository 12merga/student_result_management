<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Use the correct namespace for User model

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); // Ensure that only guests can access this controller
        
        // Set redirection logic based on the authenticated user's role
        $this->redirectTo = route('student.dashboard'); // Default redirection
        
        if (Auth::check()) {
            $roleId = Auth::user()->role->id;

            if ($roleId == 1) {
                $this->redirectTo = route('register.dashboard');
            } elseif ($roleId == 2) {
                $this->redirectTo = route('exam_controller.dashboard');
            } elseif ($roleId == 3) {
                $this->redirectTo = route('dept_office.dashboard');
            } elseif ($roleId == 4) {
                $this->redirectTo = route('teacher.dashboard');
            }
        }
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Fetch all roles from the database
        $roles = Role::all();

        // Pass roles to the registration view
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the request data
        $this->validator($request->all())->validate();

        // Create the user
        $user = $this->create($request->all());

        // Log in the user
        Auth::login($user);

        // Redirect to appropriate dashboard based on user role
        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // Assuming you have a role_id field in the registration form
            'role_id' => $data['role_id'], 
        ]);
    }

    /**
     * Get the path to redirect the user after registration based on their role.
     *
     * @return string
     */
    public function redirectPath()
    {
        // Custom redirect path depending on role or other logic
        return $this->redirectTo;
    }
}
