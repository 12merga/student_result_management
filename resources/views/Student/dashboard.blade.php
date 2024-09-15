@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ $student->name }}!</h1>

    <div class="card mt-4">
        <div class="card-header">Your Courses</div>
        <div class="card-body">
            @if ($courses->isEmpty())
                <p>You are not enrolled in any courses.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">Your Results</div>
        <div class="card-body">
            @if ($results->isEmpty())
                <p>You have no results yet.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Marks</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->course->code }}</td>
                                <td>{{ $result->marks }}</td>
                                <td>{{ $result->grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
