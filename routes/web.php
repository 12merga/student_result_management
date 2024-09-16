<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\parentController;
use App\Http\Controllers\Auth\TeacherController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Home Route
Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Registration Routes
        // Route::get('/register-parent', [parentController::class, 'showRegistrationForm'])->name('parent.register.form');
        // Route::post('/register-parent', [parentController::class, 'register'])->name('parent.register');

        // Route::middleware(['auth:student'])->group(function () {
        //     Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        // });

// Parent registration and login routes
Route::get('parent/register', [parentController::class, 'showRegistrationForm'])->name('parent.register');
Route::post('parent/register', [ParentController::class, 'register']);

Route::get('parent/login', [LoginController::class, 'showParentLoginForm'])->name('parent.login');
Route::post('parent/login', [LoginController::class, 'parentLogin']);

Route::middleware('auth:parent')->group(function () {
    Route::get('parent/dashboard', [parentController::class, 'dashboard'])->name('parent.dashboard');

    Route::get('parent/student/register', [ParentController::class, 'showStudentRegistrationForm'])->name('parent.student.register');
    Route::post('parent/student/register', [ParentController::class, 'registerStudent']);
});

// Student Registration Routes
Route::get('register/student', [StudentController::class, 'showRegistrationForm'])->name('student.register');
Route::post('register/student', [StudentController::class, 'register'])->name('student.register.post');


// Student Login Routes
Route::get('student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('student/login', [StudentController::class, 'login'])->name('student.login.post');

Route::middleware('auth:student')->group(function () {
    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});
// Student Dashboard
Route::middleware(['auth:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

// Parent Dashboard
Route::middleware(['auth:parent'])->group(function () {
    Route::get('/parent/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
});

// Teacher Dashboard
Route::middleware(['auth:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});