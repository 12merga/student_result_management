<!-- resources/views/teacher/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, our teacher {{ auth()->user()->name }} (Teacher)</h1>

        <h3>Your Courses</h3>
        <ul>
            @foreach($courses as $course)
                <li>{{ $course->name }}</li>
            @endforeach
        </ul>

        <h3>Students and Marks</h3>
        <ul>
            @foreach($courses as $course)
                <li>{{ $course->name }}</li>
                <ul>
                    @foreach($course->students as $student)
                        <li>{{ $student->name }}: {{ $student->pivot->marks }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
@endsection
