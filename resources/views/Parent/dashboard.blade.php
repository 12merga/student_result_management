<!-- resources/views/parent/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, to our school management system {{ auth()->user()->name }} (Parent)</h1>

        <h3>Your Children</h3>
        <ul>
            @foreach($children as $child)
                <li>{{ $child->name }} ({{ $child->class }})</li>
            @endforeach
        </ul>

        <h3>Child Results</h3>
        <ul>
            @foreach($children as $child)
                <li>{{ $child->name }}'s Results</li>
                <ul>
                    @foreach($child->results as $result)
                        <li>{{ $result->course->name }}: {{ $result->marks }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
@endsection
