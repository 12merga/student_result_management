<form action="{{ route('student.login') }}" method="POST">
    @csrf
    <input type="text" name="student_id" placeholder="Student ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
