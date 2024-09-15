<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\parentController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

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

// Student login routes
Route::get('student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('student/login', [StudentController::class, 'login']);
Route::middleware('auth:student')->group(function () {
    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});
