@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Login</h1>
        <form method="POST" action="{{ route('student.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">studentId</label>
                <input type="studetId" name="studetId" id="studetId" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
